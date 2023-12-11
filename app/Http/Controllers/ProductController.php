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
            'is_customable' => $request->input('is_customable', false),
        ]);
        
        /* Validate the data */
        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'author_name' => 'required|string',
            'height' => 'required|float',
            'width' => 'required|float',
            'length' => 'required|float',
            'is_customable' => 'required|boolean',
            'imageURL' => 'required|string',
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
            'height' => 'float',
            'width' => 'float',
            'length' => 'float',
            'is_customable' => 'boolean',
            'imageURL' => 'string',
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
