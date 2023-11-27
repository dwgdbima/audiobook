<?php

use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('index');


Route::middleware(['auth'])->group(function() {
    Route::post('/comment', [HomeController::class, 'storeComment'])->middleware('one_user_one_review')->name('store.comment');

    //change password
    Route::put('/change-password' , [ChangePasswordController::class , 'changePassword'])->middleware('prevent_wrong_old_password')->name('change.password');
});


Route::prefix('carts/')->name('carts.')->group(function(){
    Route::post('/', [CartController::class, 'store'])->name('store');
});

