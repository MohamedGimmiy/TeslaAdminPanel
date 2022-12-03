<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


    Route::get('categories', [CategoryController::class, 'index']);

    Route::post('add/category', [CategoryController::class, 'store']);

    Route::put('update/category/{id}', [CategoryController::class, 'update']);

    Route::delete('deleted/category/{id}', [CategoryController::class, 'destroy']);



    Route::get('products', [ProductController::class, 'index']);
    Route::post('add/product', [ProductController::class, 'store']);
    Route::put('update/product/{id}', [ProductController::class, 'update']);
    Route::delete('deleted/product/{id}', [ProductController::class, 'destroy']);

