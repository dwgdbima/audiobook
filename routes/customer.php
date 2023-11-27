<?php

use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::post('/comment', [HomeController::class, 'storeComment'])->middleware('one_user_one_review')->name('store.comment');
Route::get('/expand' , [HomeController::class, 'expandReview'])->name('expand.review');

Route::prefix('carts/')->name('carts.')->group(function(){
    Route::post('/', [CartController::class, 'store'])->name('store');
});
