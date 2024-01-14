<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/* Login */
Route::post('/login', [AuthController::class, 'loginUser']);
/* Logout */
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logoutUser']);

/* Create a user */
Route::post('/register', [AuthController::class, 'createUser']);
/* Update a user */
Route::middleware('auth:sanctum')->put('/users/{name}', [UserController::class, 'updateUser']);
/* Delete a user */
Route::middleware('auth:sanctum')->delete('/users/{name}', [UserController::class, 'deleteUser']);

/* Return data */
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'getProductById']);
//Route::get('/{author_name}/products', [ProductController::class, 'getProductsByAuthorName']);
Route::get('/users/{name}', [UserController::class, 'getUserByName']);


/* Create a new product */
Route::middleware('auth:sanctum')->post('/products', [ProductController::class, 'createProduct']);
/* Update a product */
Route::middleware('auth:sanctum')->put('/products/{id}', [ProductController::class, 'updateProduct']);
/* Delete a product */
Route::middleware('auth:sanctum')->delete('/products/{id}', [ProductController::class, 'deleteProduct']);
