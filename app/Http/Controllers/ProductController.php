<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use Intervention\Image\ImageManager as Image;
use Intervention\Image\Drivers\Imagick\Driver;

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

    /*public function getProductsByAuthorName($author_name)
    {
        $product = Product::where('author_name', $author_name)->get();
        return response()->json($product);
    }*/

    // Create a new product
    public function createProduct(Request $request)
    {

        $body = json_decode($request->getContent(), true);
        $imageString = $body['imageURL']['value']; // https://codea.app/blog/subir-imagenes-con-laravel
        $imageType = $body['imageURL']['filetype'];
        $imageData = 'data:' . $imageType . ';base64,' . $imageString;
        //$imageName = "img/" . $body['imageURL']['filename'];
        $body['imageURL'] = $imageData; // Falta hacer punto 5 de: https://codea.app/blog/subir-imagenes-con-laravel

        //file_put_contents(public_path($imageName), base64_decode($imageString)); // https://nehalist.io/uploading-files-in-angular2/

        /* Validate the data */
        $validator = Validator::make($body, [
            'title' => 'required|string',
            'description' => 'required|string',
            'author_name' => 'required|string',
            'category' => 'required|string',
            'cm_height' => 'required|decimal:0,2',
            'cm_width' => 'required|decimal:0,2',
            'cm_length' => 'required|decimal:0,2',
            'is_customable' => 'required|boolean',
            'price' => 'required|decimal:0,2'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422); // 422 means "Unprocessable Entity"
        }

        /*if($request->hasFile("image")){
            $imageFile = $request->file("image"); // Get the image file from the request          
            $imagename = $imageFile->getClientOriginalName(); // Get the original image name
            $body->imageURL = $imagename; // Set the image orignal name inside the imageURL attribute

            $route = public_path("img/post/"); // Route to save the image
            $manager = new Image(new Driver()); // Instantiate a new Image object
            $image = $manager->read($imageFile->getRealPath()); // Read image from filesystem
            $image->save($route); // Save the image inside the public/img/post folder
        }*/

        $product = Product::create($body)->save();

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

        $body = json_decode($request->getContent(), true);

        if (array_key_exists('value', $body['imageURL'])) {
            $imageString = $body['imageURL']['value']; 
            $imageType = $body['imageURL']['filetype'];
            $imageData = 'data:' . $imageType . ';base64,' . $imageString;
            $body['imageURL'] = $imageData;
        }

        /* Validate the data */
        $validator = Validator::make($body, [
            'title' => 'string',
            'description' => 'string',
            'author_name' => 'string',
            'category' => 'string',
            'cm_height' => 'decimal:0,2',
            'cm_width' => 'decimal:0,2',
            'cm_length' => 'decimal:0,2',
            'is_customable' => 'boolean',
            'price' => 'decimal:0,2',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422); // 422 means "Unprocessable Entity"
        }
        
        $product->update($body);

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
