<?php

use App\Http\Controllers\Api\V1\Carts\Products\StoreController as CartProductStoreController;
use App\Http\Controllers\Api\V1\Products\ShowController;
use App\Http\Controllers\Api\V1\Carts\IndexController;
use App\Http\Controllers\Api\V1\Carts\StoreController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 *  Product Routes
 */
Route::prefix('products')->as('products:')->group(function () {
    /**
     * Show all products
     */
//    Route::get('/', IndexController::class)->name('index');

    Route::get('{key}', ShowController::class)->name('show');
});

/*
 *  Cart Routes
 */

Route::prefix('carts')->as('carts:')->group(function () {
    /*
     * Get the users cart
     */
    Route::get('/', IndexController::class)->name('index');

    /*
     * Create a new Cart
     */
    Route::post('/', StoreController::class)->name('store');

    /*
     * Add product to cart
     */
    Route::post('{cart:uuid}/products', CartProductStoreController::class)->name('products:store');
//
//    /*
//     * Update quantity
//     */
//    Route::patch('{cart}/products/{cartItem}', UpdateController::class)->name('products:update');
//
//    /*
//     * Delete product
//     */
//    Route::delete('{cart}/products/{cartItem}', UpdateController::class)->name('products:delete');
});

