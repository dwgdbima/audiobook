<?php

namespace App\Http\Controllers\Admin;

use App\Contract\Repository\UserRepositoryInterface;
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

    public function __construct(UserRepositoryInterface $userRepositoryInterface , OrderServiceInterface $orderServiceInterface, CommentServiceInterface $commentServiceInterface)
    {
        $this->userRepositoryInterface = $userRepositoryInterface;
        $this->orderServiceInterface = $orderServiceInterface;
        $this->commentServiceInterface = $commentServiceInterface;
    }


    public function index()
    {
        return view('web.admin.pages.dashboard-general-dashboard');
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
