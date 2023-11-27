<?php

use App\Contract\Service\BookServiceInterface;
use App\Http\Controllers\Sidebar\SidebarController;
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
