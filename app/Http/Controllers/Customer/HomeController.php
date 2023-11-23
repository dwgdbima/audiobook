<?php

namespace App\Http\Controllers\Customer;

use App\Contract\Service\BookServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $bookService;
    public function __construct(BookServiceInterface $bookServiceInterface)
    {
        $this->bookService = $bookServiceInterface;
    }
    public function index()
    {
        return view('web.customer.home.index', ['books' => $this->bookService->getAllWithReviewCount()]);
    }
}
