<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::resource('products', ProductController::class);



//Public Routes
Route::post('/register', [ AuthController::class, 'register']);
Route::get('/products',[ProductController::class, 'index'] );
Route::get('/products{id}',[ProductController::class, 'show'] );
Route::get('/products/search/{name}', [ ProductController::class, 'search']);

//protected Routes
Route::group( ['middleware' => ['auth:sanctum']],function () {
    Route::post('/products', [ ProductController::class, 'store']);
    Route::put('/products{id}', [ ProductController::class, 'update']);
    Route::delete('/products{id}', [ ProductController::class, 'destroy']);
    Route::post('/logout', [ AuthController::class, 'logout']);




});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
