<?php

use App\Http\Controllers\Affiliator\AffiliatorController;
use App\Http\Controllers\Customer\AboutController;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\Customer\PlaylistController;
use App\Http\Controllers\Customer\ProfileController;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->group(function() {
    Route::get('/' , 'index')->name('index');
    Route::get('/setting' , 'setting')->name('setting');
    Route::get('/support' , 'support')->name('support');
    Route::get('/privacy-policy' , 'privacy_policy')->name('privacy.policy');
    Route::get('/pages' , 'pages')->name('pages');
    Route::post('/comment' , 'storeComment')->middleware('one_user_one_review')->name('store.comment');
});

Route::controller(ProfileController::class)->group(function() {
    Route::get('/change-password' , 'changePasswordView')->name('change.password');
    Route::get('/profile' , 'profile')->name('profile');
    Route::get('/profile/edit' , 'editProfileView')->name('edit.profile.view');
    Route::put('/profile/edit' , 'editProfile')->name('edit.profile');
    Route::put('/change-password' , 'changePassword')->middleware('prevent_wrong_old_password')->name('change.password');
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
    // Route::post('webhook-ipaymu', [OrderController::class, 'webhookIpaymu'])->name('webhook.ipaymu');
});

Route::prefix('playlists/')->name('playlists.')->group(function(){
    Route::get('/{id}', [PlaylistController::class, 'show'])->name('show');
});

Route::prefix('about/')->name('about.')->group(function(){
    Route::get('/', [AboutController::class, 'index'])->name('index');
});

Route::get('join-affiliator', [AffiliatorController::class, 'joinAffiliator'])->name('join-affiliator');
Route::post('join-affiliator', [AffiliatorController::class, 'store'])->name('join-affiliator.store');
