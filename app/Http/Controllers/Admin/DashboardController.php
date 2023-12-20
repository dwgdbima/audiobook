<?php

namespace App\Http\Controllers\Admin;

use App\Contract\Repository\UserRepositoryInterface;
use App\Contract\Service\AffiliatorServiceInterface;
use App\Contract\Service\BookServiceInterface;
use App\Contract\Service\CommentServiceInterface;
use App\Contract\Service\OrderDetailServiceInterface;
use App\Contract\Service\OrderServiceInterface;
use App\Contract\Service\ProductServiceInterface;
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
    protected $productServiceInterface;
    protected $orderDetailServiceInterface;

    public function __construct(UserRepositoryInterface $userRepositoryInterface , OrderServiceInterface $orderServiceInterface, CommentServiceInterface $commentServiceInterface, BookServiceInterface $bookServiceInterface, AffiliatorServiceInterface $affiliatorServiceInterface, ProductServiceInterface $productServiceInterface, OrderDetailServiceInterface $orderDetailServiceInterface)
    {
        $this->userRepositoryInterface = $userRepositoryInterface;
        $this->orderServiceInterface = $orderServiceInterface;
        $this->commentServiceInterface = $commentServiceInterface;
        $this->bookServiceInterface = $bookServiceInterface;
        $this->affiliatorServiceInterface = $affiliatorServiceInterface;
        $this->productServiceInterface = $productServiceInterface;
        $this->orderDetailServiceInterface = $orderDetailServiceInterface;
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
        $sumSuccessOrders = $this->orderServiceInterface->sumSuccessOrder();

        return view('web.admin.pages.dashboard-general-dashboard' , [
            'orders' => $orders,
            'fiveOrders' => $fiveOrders,
            'selling' => $sellingPercentage,
            'successOrder' => $successOrder,
            'totalCustomer' => $totalCustomer,
            'totalAffiliator' => $totalAffiliator,
            'activeUsers' => $activeUsers,
            'sumSuccessOrders' => $sumSuccessOrders
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
        $orders = $this->orderServiceInterface->getAllOrders();
        $soldProduct = null;

        if($request->ord_code && !is_numeric($request->product_select)){
            $orders = $this->orderServiceInterface->searchByCode($request->ord_code);
        }

        if($request->product_select && is_numeric($request->product_select)){
            $orders = $this->orderServiceInterface->getSpecifiecOrderProduct($request->product_select);

            $soldProduct = $this->orderDetailServiceInterface->countSoldProduct($request->product_select);

            if($request->ord_code){
                $orders = $this->orderServiceInterface->searchByCode($request->ord_code, $request->product_select); 
            }
        }

    
        $products = $this->productServiceInterface->getProductByBookId(1);
       
        
        return view('web.admin.pages.show-order-management' , [
            'orders' => $orders,
            'products' => $products,
            'soldProduct' => $soldProduct
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
