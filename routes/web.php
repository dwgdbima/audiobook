<?php

use App\Contract\Service\BookServiceInterface;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\Menu\FooterController;
use App\Http\Controllers\Menu\SidebarController;
use App\Models\Order;
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
    $fiveOrders = Order::with(['user:name,id', 'orderDetails' => function($orderDetail) {
        $orderDetail->select('id' , 'order_id' , 'product_id')
        ->with(['product' => function($product) {
            $product->select('id' , 'name' , 'book_id' , 'price')
            ->with(['book:id,title']);
        }]);
    }])
    ->select('id' , 'user_id' , 'created_at')
    ->latest()
    ->take(5)
    ->get();


$collection = collect();

foreach ($fiveOrders as $key => $order) {
    $data = [];
    
    foreach ($order->orderDetails as $detail) {
        $bookTitle = $detail->product->book->title;
        $productName = $detail->product->name;
        $price = $detail->product->price;
       
        if (!isset($data[$bookTitle])) {
            $data[$bookTitle] = [
                'product' => $productName,
                'price' => $price
            ];
        } else {
            $data[$bookTitle]['product'] .= ', ' . $productName;
            $data[$bookTitle]['price'] += $price;
        }
    }

    $collection->push([
        'name' => $order->user->name,
        'data' => $data
    ]);
}

return $collection;
});
Route::post('webhook-ipaymu', [OrderController::class, 'webhookIpaymu'])->name('webhook.ipaymu');

