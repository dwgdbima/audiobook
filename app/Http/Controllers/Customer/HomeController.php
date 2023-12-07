<?php

namespace App\Http\Controllers\Customer;

use App\Contract\Service\BookServiceInterface;
use App\Contract\Service\ProductServiceInterface;
use App\Contract\Service\ReviewServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewCommentRequest;
use App\Models\Review;
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
        return view('web.customer.home.index', [
            'book' => $this->bookService->findWithReviewCount(1),
            'products' => $this->productService->displayProduct(1),
            'reviews' => $this->reviewService->getReviewByBookId(1),
        ]);
    }

    /**
     * Handle store review comment
     */
    public function storeComment(ReviewCommentRequest $request)
    {
        $validatedData = $request->validated();

        $this->reviewService->storeReviewComment([
            'book_id' => $validatedData['book'],
            'point' => $validatedData['star'],
            'comment' => $validatedData['comment'],
            'user_id' => auth()->user()->id
        ]);

        return back();
    }


    /**
     * Setting view
     */
    public function setting()
    {
        return view('web.customer.home.setting');
    }

     /**
     * Support view
     */
    public function support()
    {
        return view('web.customer.home.support');
    }


     /**
     * Pricacy & policy view
     */
    public function privacy_policy()
    {
        return view('web.customer.home.privacy-policy');
    }

    public function pages()
    {
        return view('web.customer.home.pages');
    }


}
