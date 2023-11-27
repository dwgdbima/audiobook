<?php

namespace App\Services;

use App\Contract\Repository\ProductRepositoryInterface;
use App\Contract\Service\CartServiceInterface;
use App\Contract\Service\ProductServiceInterface;

class ProductService extends BaseService implements ProductServiceInterface
{
    // protected $repository = \App\Repositories\ProductRepository::class;
    protected $cartService;
    
    public function __construct(ProductRepositoryInterface $productRepositoryInterface, CartServiceInterface $cartServiceInterface)
    {
        $this->repository = $productRepositoryInterface;
        $this->cartService = $cartServiceInterface;
    }

    public function getProductByBookId($id)
    {
        $products = $this->repository->with(['chapters'])->findMany([['book_id', $id]]);

        return $products;
    }

    public function displayProduct($id)
    {
        $products = $this->getProductByBookId($id);
        $carts = $this->cartService->getAllWithUserId(auth()->id());
        $notInArray = [];

        foreach($carts as $cart){
            array_push($notInArray, $cart->product_id);
        }

        return $products->whereNotIn('id', $notInArray);
    }
}