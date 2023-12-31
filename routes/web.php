<?php

use App\Contract\Service\BookServiceInterface;
use App\Export\Excel as ExportExcel;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\Menu\FooterController;
use App\Http\Controllers\Menu\SidebarController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

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

Route::get('/about', function (){
    return view('web.about');
})->name('about');

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('test', function(){
    $product = Product::find(1);
    echo $product->price + 150;
});

Route::get('gateway-login/{email}', function($email){
    $user = User::where('email', $email)->first();
    return Auth::guard()->login($user);
});

Route::get('/testing' , function(){

    $orders = Order::with(['user' , 'orderDetails.product.book'])->whereHas('orderDetails' , function($details) {
        $details->where('product_id' , 1);
      })
      ->where('status' , 1)
      ->latest()
   ->get();

  
        return view('web.admin.export.order-export-product' , [
            'orders' => $orders
           ]);
    
});

Route::post('webhook-ipaymu/', [OrderController::class, 'webhookIpaymu'])->name('webhook.ipaymu');
