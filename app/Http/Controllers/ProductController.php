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
}
