<?php

use App\Contract\Service\BookServiceInterface;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\Menu\FooterController;
use App\Http\Controllers\Menu\SidebarController;
use App\Models\Order;
use Carbon\Carbon;
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
    dd(asset('dist'));
});
Route::get('/ngetes', function () {
  echo "TEST";
    
});
Route::post('webhook-ipaymu', [OrderController::class, 'webhookIpaymu'])->name('webhook.ipaymu');

