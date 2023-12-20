<?php

namespace App\Http\Controllers\Affiliator;

use App\Contract\Service\AffiliatorServiceInterface;
use App\Contract\Service\PayAffiliateServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\JoinAffiliateRequest;
use Illuminate\Http\Request;

class AffiliatorController extends Controller
{
    protected $affiliatorService, $payAffiliateService;

    public function __construct(AffiliatorServiceInterface $affiliatorServiceInterface, PayAffiliateServiceInterface $payAffiliateServiceInterface)
    {
        $this->affiliatorService = $affiliatorServiceInterface;
        $this->payAffiliateService = $payAffiliateServiceInterface;
    }

    public function index()
    {
        $user = auth()->user();

        // dd($this->payAffiliateService->getSuccessByUserIdPaginated(auth()->id(), 5));
        
        $affiliator = $this->affiliatorService->getByUserId($user->id);
        return view('web.customer.affiliator.index', [
            'affiliates' => $this->affiliatorService->getMember($user->id),
            'referral_link' => $affiliator->referral_link,
            'balance' => $this->affiliatorService->getBalance($user->id),
            'transactions' => $this->payAffiliateService->getSuccessByUserIdPaginated(auth()->id(), 5) 
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