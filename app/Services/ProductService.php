<?php

namespace App\Services;

use App\Contract\Repository\ProductRepositoryInterface;
use App\Contract\Service\CartServiceInterface;
use App\Contract\Service\OrderServiceInterface;
use App\Contract\Service\ProductServiceInterface;

class ProductService extends BaseService implements ProductServiceInterface
{
    // protected $repository = \App\Repositories\ProductRepository::class;
    protected $cartService, $orderService;
    
    public function __construct(ProductRepositoryInterface $productRepositoryInterface, CartServiceInterface $cartServiceInterface, OrderServiceInterface $orderServiceInterface)
    {
        $this->repository = $productRepositoryInterface;
        $this->cartService = $cartServiceInterface;
        $this->orderService = $orderServiceInterface;
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
        $successOrders = $this->orderService->getSuccessOrderByUser(auth()->id());
        $notInArray = [];

        foreach($carts as $cart){
            array_push($notInArray, $cart->product_id);
        }

        $products = $products->whereNotIn('id', $notInArray);

        $notInArray = [];

        foreach($successOrders as $successOrder){
            foreach($successOrder->orderDetails as $orderDetail){
                array_push($notInArray, $orderDetail->product_id);
            }
        }

        return $products->whereNotIn('id', $notInArray);
    }


    public function storeBulkProduct(array $data)
    {
        $products = $this->repository->storeBulkProduct($data);

        return $products;
        
    }

    public function getAllProduct()
    {
        return $this->repository->with(['book'])->getAll();
    }


    public function findSingleProduct(int $id)
    {
        return $this->repository->find($id);
    }

    public function updateProductDependOnBook(array $data)
    {
        $product = $this->repository->updateProductDependOnBook($data);

        return $product;
    }
}