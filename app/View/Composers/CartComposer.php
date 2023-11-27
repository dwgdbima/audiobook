<?php

namespace App\View\Composers;

use App\Contract\Service\CartServiceInterface;
use Illuminate\View\View;

class CartComposer
{
    protected $cartService;

    public function __construct(CartServiceInterface $cartServiceInterface)
    {
        $this->cartService = $cartServiceInterface;
    }

    public function compose(View $view)
    {
        $view->with('cartCount', $this->cartService->getAllWithUserId(auth()->id())->count());
    }
}