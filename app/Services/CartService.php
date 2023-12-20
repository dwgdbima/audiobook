<?php

namespace App\Services;

use App\Contract\Repository\CartRepositoryInterface;
use App\Contract\Service\CartServiceInterface;
use App\Contract\Service\OrderServiceInterface;

class CartService extends BaseService implements CartServiceInterface
{
    // protected $repository = \App\Repositories\CartRepository::class;
    protected $orderService;

    public function __construct(CartRepositoryInterface $cartRepositoryInterface, OrderServiceInterface $orderServiceInterface)
    {
        $this->repository = $cartRepositoryInterface;
        $this->orderService = $orderServiceInterface;
    }

    public function getAllWithUserId($id)
    {
        $products = $this->repository->with(['product'])->findMany([['user_id', $id]]);

        return $products;
    }

    public function addToCart($user_id, $product_id)
    {
        $cart = $this->repository->create([
            'user_id' => $user_id,
            'product_id' => $product_id,
        ]);

        return $cart;
    }

    public function checkOut()
    {
        $data = ['status' => 200];

        $carts = $this->getAllWithUserId(auth()->id());
        
        if($carts->isEmpty()){
            $data = ['status' => 204, 'data' => $carts];
            return $data;
        }

        $products = [];
        foreach($carts as $cart){
            array_push($products, ['id' => $cart->product_id]);
        }

        $makeOrder = $this->orderService->makeOrder($products);

        foreach($carts as $cart){
            $this->delete($cart);
        }

        $data['data'] = $makeOrder;
        
        return $data;
    }
}