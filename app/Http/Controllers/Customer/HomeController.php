<?php

namespace App\Http\Controllers\Customer;

use App\Contract\Service\BookServiceInterface;
use App\Contract\Service\ProductServiceInterface;
use App\Contract\Service\ReviewServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $bookService, $reviewService, $productService;

    public function __construct(BookServiceInterface $bookServiceInterface, ReviewServiceInterface $reviewServiceInterface, ProductServiceInterface $productServiceInterface)
    {
        $this->bookService = $bookServiceInterface;
        $this->reviewService = $reviewServiceInterface;
        $this->productService = $productServiceInterface;
    }

    public function index()
    {
        // dd($this->productService->getProductByBookId(1));
        return view('web.customer.home.index', [
            'book' => $this->bookService->findWithReviewCount(1),
            'reviews' => $this->reviewService->getReviewByBookId(1)
        ]);
    }
}
