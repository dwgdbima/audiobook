<?php

namespace App\Services;

use App\Contract\Service\CartServiceInterface;

class CartService extends BaseService implements CartServiceInterface
{
    protected $repository = \App\Repositories\CartRepository::class;

    public function getAllWithUserId($id)
    {
        $products = $this->repository->with(['products'])->findMany([['user_id', $id]]);

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

    public function removeFromCart($user_id, $product_id)
    {
        $cart = $this->repository->findFirst([['user_id', $user_id], ['product_id', $product_id]]);
        $this->repository->delete($cart);

        return true;
    }
}