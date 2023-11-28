<?php

namespace App\Http\Controllers\Customer;

use App\Contract\Service\OrderServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
