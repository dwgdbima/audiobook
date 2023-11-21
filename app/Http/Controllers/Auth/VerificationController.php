<?php

namespace App\Http\Controllers\Auth;

use App\Contract\Service\AuthServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use App\Traits\RedirectsAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Hash;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails, RedirectsAuth;
    public $authService;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AuthServiceInterface $authService)
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
        $this->authService = $authService;
        
    }

    public function redirectTo()
    {
        return $this->redirectByRole(Auth::user());
    }

    /**
     * Show the email verification notice.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function show(Request $request)
    {
        if($request->user()->hasVerifiedEmail()){
            return redirect($this->redirectPath());
        }else{
            if($request->user()->hasRole('merchant')){
                return view('web.merchant.verify.index');
            }else{
                return view('web.promoter.verify.index');
            }
        }
    }

    public function verify(Request $request)
    {
        $this->authService->verifyUrl($request->route('id'), $request->route('hash'));

        if ($request->user()->hasVerifiedEmail()) {
            return redirect($this->redirectByRole($request->user()));
        }
        
        if(Auth::user()->hasRole('merchant')){
            return view('web.merchant.verify.verify', ['action' => url()->full()]);
        }

        if(Auth::user()->hasRole('promoter')){
            return view('web.promoter.verify.verify', ['action' => url()->full()]);
        }
    }

    public function verifyConfirmation(Request $request)
    {
        $this->authService->verifyUrl($request->route('id'), $request->route('hash'));

        $this->authService->verifyConfirmation($request->input('password'));

        return redirect()->back();
    }
}
