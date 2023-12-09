<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Traits\RedirectsAuth;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords, RedirectsAuth;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function redirectTo()
    {
        return $this->redirectByRole(Auth::user());
    }

    /**
     * Display the password reset view for the given token.
     *
     * If no token is present, display the link request form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showResetForm(Request $request)
    {
        $token = $request->route()->parameter('token');

        return view('web.auth.passwords.reset')->with([
                'title' => 'Reset Password',
                'menu' => 'reset password',
                'token' => $token,
                'email' => $request->email,
            ]
        );
    }

    public function reset(Request $request)
    {
        $request->validate($this->rules(), $this->validationErrorMessages());

        $password_reset = DB::table('password_resets')->select('*')->where('email', $request->input('email'));
        
        if($password_reset == null){
            Alert::error('Gagal', 'Email tidak cocok');
            return redirect()->back();
        }

        if(!Hash::check($request->input('token'), $password_reset->first()->token)){
            Alert::error('Gagal', 'Token tidak cocok');
            return redirect()->back();
        }

        $user = User::where('email', $request->input('email'))->first();

        $user->update(['password' => Hash::make($request->input('password'))]);

        $password_reset->delete();

        $this->guard()->login($user);

        if($user->hasRole('admin')){
            return redirect()->route('admin.index');
        }else{
            return redirect()->route('customer.index');
        }
    }
}
