<?php

namespace App\Http\Controllers\Customer;

use App\Contract\Service\OrderServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderServiceInterface $orderServiceInterface)
    {
        $this->orderService = $orderServiceInterface;
    }

    public function index()
    {
        $orders = $this->orderService->getOrderWithOrderDetailsByUser(auth()->id());
        return view('web.customer.order.index', ['orders' => $orders]);
    }

    public function show($id)
    {
        return view('web.customer.order.show', ['order' => $this->orderService->findOrderWithOrderDetails($id)]);
    }

    public function webhookIpaymu(Request $request){
        // $order = $this->orderService->updateStatusPayment($request->input('reference_id'), $request->input('status_code'));
        // Log::info($order);
        return response()->json($request->all(), 200);
    }
}
