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
    $month = now()->format('m');

    $lastMonth = Order::with(['orderDetails.product'])->whereMonth('created_at' , $month - 1)->get();
    $currentMonth = Order::with(['orderDetails.product'])->whereMonth('created_at' , $month)->get();
   
    $yesterday = $currentMonth->where('created_at', '>=', now()->subDays(1)->startOfDay())
    ->where('created_at', '<=', now()->subDays(1)->endOfDay());
    $today = $currentMonth->where('created_at', '>=', now()->startOfDay())
    ->where('created_at', '<=', now()->endOfDay());

   $priceYesterday = $yesterday->pluck('orderDetails.*.product.price')->flatten()->sum();
   $priceToday = $today->pluck('orderDetails.*.product.price')->flatten()->sum();

   $priceLastMonth = $lastMonth->pluck('orderDetails.*.product.price')->flatten()->sum();
   $priceCurrentMonth = $currentMonth->pluck('orderDetails.*.product.price')->flatten()->sum();

   $range = $priceToday - $priceYesterday;
   $range = ($range / $priceYesterday) * 100;

   $rangeMonthly = $priceCurrentMonth - $priceLastMonth;
   $rangeMonthly = ($rangeMonthly / $priceLastMonth) * 100;

   return response()->json([
        'daily' => [
            'percentage' => round($range),
            'range' => [
                $priceYesterday,
                $priceToday
            ],
            'labels' => [
                now()->subDays(1)->isoFormat('dddd'),
                now()->isoFormat('dddd'),
            ]
        ],
        'monthly' => [
            'percentage' => round($rangeMonthly),
            'range' => [
                $priceLastMonth,
                $priceCurrentMonth
            ],
            'labels' => [
                now()->subMonths(1)->isoFormat('MMMM'),
                now()->isoFormat('MMMM'),
            ]
        ]
   ]);

    
});
Route::post('webhook-ipaymu', [OrderController::class, 'webhookIpaymu'])->name('webhook.ipaymu');

