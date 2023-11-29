<?php

namespace App\Http\Controllers\Admin;

use App\Contract\Service\BookServiceInterface;
use App\Contract\Service\ProductServiceInterface;
use App\Contract\Service\ReviewServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $bookService, $reviewService, $productService;

    public function __construct(BookServiceInterface $bookServiceInterface, ReviewServiceInterface $reviewServiceInterface, ProductServiceInterface $productServiceInterface)
    {
        $this->bookService = $bookServiceInterface;
        $this->reviewService = $reviewServiceInterface;
        $this->productService = $productServiceInterface;
    }

    /**
     * Show single product for now
     */
    public function single_product()
    {
        return view('web.customer.home.index', [
            'book' => $this->bookService->findWithReviewCount(1),
            'products' => $this->productService->displayProduct(1),
            'reviews' => $this->reviewService->getReviewByBookId(1)
        ]);
    }
}
