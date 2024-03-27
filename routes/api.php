<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShippingInfoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('v1')->group(function () {
    Route::apiResource('products', ProductController::class);
    Route::apiResource('categories', CategoryController::class)->only('show', 'index');
});

Route::prefix('v1')->group(function () {
    Route::middleware('auth:sanctum')->group(function () {
        Route::apiResource('user', UserController::class);
        Route::apiResource('shippingInfo', ShippingInfoController::class)->only(['show', 'update', 'destroy']);
//        Route::get('/user', function (Request $request) {
//            return $request->user();
//        });
    });

    Route::prefix('cart')->middleware('auth:sanctum')->group(function () {
        Route::apiResource('/', CartController::class)->only(['index', 'update', 'destroy']);
        Route::get('/total', [CartController::class, 'getTotal']);
        Route::get('/count', [CartController::class, 'getCount']);
    });
});



Route::prefix('v1')->middleware('guest')->group(function () {

    Route::post('register', [RegisterController::class, 'register']);
    Route::post('login', [LoginController::class, 'login']);
});


