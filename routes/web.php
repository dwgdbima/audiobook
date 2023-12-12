<?php

use App\Contract\Service\BookServiceInterface;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\Menu\FooterController;
use App\Http\Controllers\Menu\SidebarController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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

Route::get('test', function(){
    $orders = Order::select('id')->orderBy('id', 'asc')->get()->take(20)->chunk(5);
    $slice = collect();
    $splice = collect();
    
    foreach ($orders as $key => &$value) {

        if($key > 0){
            $value->push(...$slice);
            $splice = $value->splice(rand(0 , $value->count() - 2) , 2);
            $slice = $splice;

            $value = $value->sort();

        }else{
            $slice = $value->slice(rand(0 , $value->count() - 2) , 2);
            
        }
    }
   
    $orders->push($slice);
    return $orders;

});

Route::post('webhook-ipaymu/', [OrderController::class, 'webhookIpaymu'])->name('webhook.ipaymu');
