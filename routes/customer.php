<?php

use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\Customer\PlaylistController;
use App\Http\Controllers\Customer\ProfileController;
use App\Http\Controllers\Menu\FooterController;
use App\Http\Controllers\Menu\SidebarController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('index');


Route::post('/comment', [HomeController::class, 'storeComment'])->middleware('one_user_one_review')->name('store.comment');

//change password
Route::put('/change-password' , [ChangePasswordController::class , 'changePassword'])->middleware('prevent_wrong_old_password')->name('change.password');

// edit profile
Route::put('/profile/edit' , [ProfileController::class , 'edit_profile'])->name('edit.profile');



// sidebar route
Route::controller(SidebarController::class)->group(function() {
    Route::get('/pages' , 'pages')->name('pages');
    Route::get('/profile' , 'profile')->name('profile');
    Route::get('/profile/edit' , 'edit_profile')->name('edit.profile');
});

// footer route
Route::controller(FooterController::class)->group(function() {
    Route::get('/setting' , 'setting')->name('setting');
    Route::get('/support' , 'support')->name('support');
    Route::get('/privacy-policy' , 'privacy_policy')->name('privacy.policy');
    Route::get('/change-password' , 'change_password')->name('change.password');
});


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

