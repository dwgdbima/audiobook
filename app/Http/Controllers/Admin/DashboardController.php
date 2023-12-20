<?php

namespace App\Http\Controllers\Admin;

use App\Contract\Repository\UserRepositoryInterface;
use App\Contract\Service\AffiliatorServiceInterface;
use App\Contract\Service\BookServiceInterface;
use App\Contract\Service\CommentServiceInterface;
use App\Contract\Service\OrderServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $userRepositoryInterface;
    protected $orderServiceInterface;
    protected $commentServiceInterface; 
    protected $bookServiceInterface; 
    protected $affiliatorServiceInterface;

    public function __construct(UserRepositoryInterface $userRepositoryInterface , OrderServiceInterface $orderServiceInterface, CommentServiceInterface $commentServiceInterface, BookServiceInterface $bookServiceInterface, AffiliatorServiceInterface $affiliatorServiceInterface)
    {
        $this->userRepositoryInterface = $userRepositoryInterface;
        $this->orderServiceInterface = $orderServiceInterface;
        $this->commentServiceInterface = $commentServiceInterface;
        $this->bookServiceInterface = $bookServiceInterface;
        $this->affiliatorServiceInterface = $affiliatorServiceInterface;
    }


    public function index(Request $request)
    {
        $orders = $request->ord_code ? $this->orderServiceInterface->searchByCode($request->ord_code) : $this->orderServiceInterface->getAllOrders();

        $fiveOrders = $this->orderServiceInterface->takeFiveLatestOrder();
        $sellingPercentage = $this->orderServiceInterface->getSellingPercentage();
        $successOrder = $this->orderServiceInterface->countSuccessOrder();
        $totalCustomer = $this->userRepositoryInterface->countCustomer();
        $totalAffiliator = $this->affiliatorServiceInterface->countAffiliator();
        $activeUsers = $this->userRepositoryInterface->activeUser();

        return view('web.admin.pages.dashboard-general-dashboard' , [
            'orders' => $orders,
            'fiveOrders' => $fiveOrders,
            'selling' => $sellingPercentage,
            'successOrder' => $successOrder,
            'totalCustomer' => $totalCustomer,
            'totalAffiliator' => $totalAffiliator,
            'activeUsers' => $activeUsers
        ]);
    }


    public function showUsers(Request $request)
    {
        $customers = $request->s_name ? $this->userRepositoryInterface->searchByName($request->s_name) : $this->userRepositoryInterface->getAllCustomer();
       
        return view('web.admin.pages.show-user-management' , [
            'customers' => $customers
        ]);
    }


    public function showOrders(Request $request)
    {
        $orders = $request->ord_code ? $this->orderServiceInterface->searchByCode($request->ord_code) : $this->orderServiceInterface->getAllOrders();
       
        return view('web.admin.pages.show-order-management' , [
            'orders' => $orders
        ]);
    }


    public function showBooks(Request $request)
    {
        $books = $request->s_name ? $this->bookServiceInterface->searchByTitle($request->s_name) : $this->bookServiceInterface->getAllWithRelationPagination();
        
        return view('web.admin.pages.show-book-management' , [
            'books' => $books
        ]);
    }


    public function showAffiliate(Request $request)
    {
        $affiliators = $request->s_name ? $this->affiliatorServiceInterface->searchByName($request->s_name) : $this->affiliatorServiceInterface->getAffiliators();
        
        return view('web.admin.pages.show-affiliate-management' , [
            'affiliators' => $affiliators
        ]);
    }


    public function storeComment(CommentRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['user_id'] = auth()->user()->id;

        $this->commentServiceInterface->storeReviewComment($validatedData);

        return back();
    }


    public function setting()
    {
        return view('web.admin.pages.setting');
    }

}
