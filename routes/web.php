<?php

use App\Contract\Service\BookServiceInterface;
use App\Http\Controllers\Menu\FooterController;
use App\Http\Controllers\Menu\SidebarController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('test', function(BookServiceInterface $bookServiceInterface){
    $result = $bookServiceInterface->getAllWithReviewCount();
    dd($result);
});

// sidebar route
Route::controller(SidebarController::class)->group(function() {
    Route::get('/pages' , 'pages')->name('pages');
});

// footer route
Route::controller(FooterController::class)->group(function() {
    Route::get('/setting' , 'setting')->name('setting');
    Route::get('/support' , 'support')->name('support');
    Route::get('/privacy-policy' , 'privacy_policy')->name('privacy.policy');
    Route::get('/change-password' , 'change_password')->name('change.password');
});
