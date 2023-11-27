<?php

use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::prefix('carts/')->name('carts.')->group(function(){
    Route::post('/', [CartController::class, 'store'])->name('store');
});