<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
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

Route::post('/register', [UserController::class, 'createUser']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);

/* Return data */
//Route::get('/users', [UserController::class, 'index']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'getProductById']);
//Route::get('/users/{name}', [UserController::class, 'getUserByName']);

/* Create a new user */
//Route::post('/users', [UserController::class, 'createUser']);
/* Create a new product */
Route::middleware('auth:sanctum')->post('/products', [ProductController::class, 'createProduct']);

/* Update a user */
Route::put('/users/{name}', [UserController::class, 'updateUser']);
/* Update a user */
Route::middleware('auth:sanctum')->put('/products/{id}', [ProductController::class, 'updateProduct']);

/* Delete a user */
Route::delete('/users/{name}', [UserController::class, 'deleteUser']);
/* Delete a product */
Route::middleware('auth:sanctum')->delete('/products/{id}', [ProductController::class, 'deleteProduct']);
