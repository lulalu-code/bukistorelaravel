<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Display a list of products
    public function index()
    {
        $products = Product::with('user:name,zone')->get();
        return response()->json($products);
    }

    // Display product by Id
    public function getProductById($id)
    {
        $product = Product::with('user:name,zone')->find($id);
        return response()->json($product);
    }

    // Create a new product
    public function createProduct(Request $request)
    {
        /* Give default values to non critical fields */
        $request->merge([
            'height' => $request->input('height', 0),
            'width' => $request->input('width', 0),
            'length' => $request->input('length', 0),
            'price' => $request->input('price', 0),
            'is_customable' => $request->input('is_customable', false),
            'category' => $request->input('category', '')
        ]);
        
        /* Validate the data */
        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'author_name' => 'required|string',
            'category' => 'required|string',
            'height' => 'required|decimal:0,2',
            'width' => 'required|decimal:0,2',
            'length' => 'required|decimal:0,2',
            'is_customable' => 'required|boolean',
            'imageURL' => 'required|string',
            'price' => 'required|decimal:0,2',
        ]);
        
        $product = Product::create($validatedData);

        return response()->json($product, 201);    /* 201 means "Created" */
    }

    public function updateProduct(Request $request, $id)
    {
        /* Look for the product in the database */
        $product = Product::find($id);

        /* Verify if the product exists */
        if (!$product) {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }

        /* Validate the data */
        $validatedData = $request->validate([
            'title' => 'string',
            'description' => 'string',
            'author_name' => 'string',
            'category' => 'string',
            'height' => 'decimal:0,2',
            'width' => 'decimal:0,2',
            'length' => 'decimal:0,2',
            'is_customable' => 'boolean',
            'imageURL' => 'string',
            'price' => 'decimal:0,2',
        ]);
        
        $product->update($validatedData);

        return response()->json($product, 200);    /* 200 means "OK" */
    }

    public function deleteProduct($id){
        /* Look for the product in the database */
        $product = Product::find($id);

        /* Verify if the product exists */
        if (!$product) {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }

        $product->delete();

        return response()->json(['message' => 'Producto eliminado correctamente'], 200);
    }
}
