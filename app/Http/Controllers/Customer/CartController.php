<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contract\Service\CartServiceInterface;
use Exception;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public $cartService;

    public function __construct(CartServiceInterface $cartServiceInterface)
    {
        $this->cartService = $cartServiceInterface;
    }

    public function getCartByUserId($id)
    {

    }

    public function store(Request $request)
    {
        try{
            $data = $this->cartService->addToCart(auth()->id(), $request->input('product_id'));
            $result = [
                'status' => 200,
                'data' => $data
            ];
        }catch(Exception $e){
            $result = [
                'status' => 422,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result);
    }
}
