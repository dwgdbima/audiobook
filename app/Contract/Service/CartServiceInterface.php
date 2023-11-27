<?php

namespace App\Contract\Service;

interface CartServiceInterface extends BaseServiceInterface
{
    public function getAllWithUserId($id);

    public function addToCart($user_id, $product_id);
}