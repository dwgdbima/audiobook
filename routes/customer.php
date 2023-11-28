<?php

use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\Customer\PlaylistController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::post('/comment', [HomeController::class, 'storeComment'])->middleware('one_user_one_review')->name('store.comment');

Route::prefix('carts/')->name('carts.')->group(function(){
    Route::get('/', [CartController::class, 'index'])->name('index');
    Route::post('/', [CartController::class, 'store'])->name('store');
    Route::delete('/{cart_id}', [CartController::class, 'destroy'])->name('destroy');
    Route::get('/checkout', [CartController::class, 'checkOut'])->name('checkout');
});

Route::prefix('orders/')->name('orders.')->group(function(){
    Route::get('/', [OrderController::class, 'index'])->name('index');
    Route::get('/{id}', [OrderController::class, 'show'])->name('show');
});

Route::prefix('playlists/')->name('playlists.')->group(function(){
    Route::get('/{id}', [PlaylistController::class, 'show'])->name('show');
});
