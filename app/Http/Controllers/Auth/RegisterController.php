<?php

namespace App\Http\Controllers\Auth;

use App\Contract\Service\AuthServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Traits\RedirectsAuth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers, RedirectsAuth;

    protected $authService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AuthServiceInterface $authService)
    {
        $this->middleware('guest');
        $this->authService = $authService;
    }

    public function redirectTo()
    {
        return $this->redirectByRole(Auth::user());
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {

        return view('web.auth.register', [
            'title' => 'Register',
            'menu' => 'register',
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(StoreUserRequest $request)
    {
        $user = $this->authService->register($request->validated());

        $this->guard()->login($user);

        if($user->hasRole('admin')){
            return redirect()->route('admin.index');
        }else{
            return redirect()->route('customer.index');
        }
    }
}
