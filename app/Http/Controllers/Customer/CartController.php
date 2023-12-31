<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contract\Service\CartServiceInterface;
use Exception;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartServiceInterface $cartServiceInterface)
    {
        $this->cartService = $cartServiceInterface;
    }

    public function index()
    {
        return view('web.customer.cart.index', ['carts' => $this->cartService->getAllWithUserId(auth()->id())]);
    }

    public function store(Request $request)
    {
        $this->cartService->addToCart(auth()->id(), $request->input('product_id'));

        return redirect()->back();
    }

    public function destroy($cart_id)
    {
        $this->cartService->delete($cart_id);

        return redirect()->back();
    }

    public function checkOut()
    {
        $order = $this->cartService->checkOut();

        if($order['status'] != 200){
            Alert::error('Keranjang Kosong', 'Silahkan masukan produk ke keranjang untuk checkout');
            return redirect()->back();
        }

        return redirect()->route('customer.orders.show', $order['data']->id);
    }
}
