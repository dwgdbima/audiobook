<?php

use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::post('/comment', [HomeController::class, 'storeComment'])->middleware('one_user_one_review')->name('store.comment');

Route::prefix('carts/')->name('carts.')->group(function(){
    Route::get('/', [CartController::class, 'index'])->name('index');
    Route::post('/', [CartController::class, 'store'])->name('store');
    Route::delete('/{cart_id}', [CartController::class, 'destroy'])->name('destroy');
});
