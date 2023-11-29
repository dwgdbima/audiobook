<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Menu\NavbarController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Auth\ChangePasswordController;
use Illuminate\Support\Facades\Route;

Route::controller(DashboardController::class)->group(function() {
    Route::get('/' , 'index')->name('dashboard');
    Route::get('/users' , 'showUsers')->name('show.users');
    Route::get('/orders' , 'showOrders')->name('show.orders');
    Route::post('/comment' , 'storeComment')->middleware('one_user_one_review')->name('admin.comment');
    Route::get('/setting' , 'setting')->name('admin.setting');
});

Route::controller(ProfileController::class)->group(function() {
    Route::get('/profile' , 'profile')->name('admin.profile');
    Route::get('/profile/edit' , 'editProfileView')->name('admin.edit.profile');
    Route::put('/profile/edit' , 'editProfile')->name('admin.edit.profile.action');
    Route::get('/change-password' , 'changePasswordView')->name('admin.change.password');
    Route::put('/change-password' , 'changePassword')->middleware('prevent_wrong_old_password')->name('admin.change.password.action');
});


Route::controller(NavbarController::class)->group(function() {
  
});


Route::controller(ProductController::class)->group(function() {
    Route::get('/product' , 'single_product')->name('admin.single.product');
});
