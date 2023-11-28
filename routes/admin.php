<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Menu\NavbarController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Auth\ChangePasswordController;
use Illuminate\Support\Facades\Route;

Route::controller(DashboardController::class)->group(function() {
    Route::get('/' , 'index')->name('dashboard');
    Route::get('/users' , 'showUsers')->name('show.users');
    Route::get('/orders' , 'showOrders')->name('show.orders');
});

Route::controller(ProfileController::class)->group(function() {
    Route::get('/profile' , 'profile')->name('admin.profile');
    Route::get('/profile/edit' , 'edit_profile_view')->name('admin.edit.profile');
    Route::put('/profile/edit' , 'edit_profile')->name('admin.edit.profile.action');
});


Route::controller(NavbarController::class)->group(function() {
    Route::get('/setting' , 'setting')->name('admin.setting');
    Route::get('/change-password' , 'change_password_view')->name('admin.change.password');
});

Route::put('/change-password' , [ChangePasswordController::class , 'changePassword'])->middleware('prevent_wrong_old_password')->name('admin.change.password.action');
