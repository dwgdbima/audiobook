<?php

namespace App\Http\Controllers\Affiliator;

use App\Contract\Service\AffiliatorServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\JoinAffiliateRequest;
use Illuminate\Http\Request;

class AffiliatorController extends Controller
{
    protected $affiliatorService;

    public function __construct(AffiliatorServiceInterface $affiliatorServiceInterface)
    {
        $this->affiliatorService = $affiliatorServiceInterface;
    }

    public function index()
    {
        $user = auth()->user();
    
        $affiliator = $this->affiliatorService->getByUserId($user->id);
        return view('web.customer.affiliator.index', [
            'referral_link' => $affiliator->referral_link,
            'balance' => $this->affiliatorService->getBalanceIpaymu($user->id)
        ]);
    }

    public function joinAffiliator()
    {
        return auth()->user()->hasRole('affiliator') ? redirect()->route('affiliator.index') : view('web.customer.affiliator.join-affiliator');
    }

    public function store(JoinAffiliateRequest $request)
    {
        $user = auth()->user();
        $affiliator = $this->affiliatorService->create([
            'user_id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'password' => $request->input('password'),
        ]);

        return redirect()->route('affiliator.index');
    }
}
