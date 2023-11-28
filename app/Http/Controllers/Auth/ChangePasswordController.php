<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ChangePasswordController extends Controller
{

    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }
    
    /**
     * Action change authenticated user password
     */
    public function changePassword(ChangePasswordRequest $request)
    {
        $validatedData = $request->validated();
        
        $result = $this->authService->changePassword($validatedData);
      
        if($result == true){
            Alert::success('Sukses' , 'Password berhasil dirubah');
            return redirect('/customer/change-password');
        }else{
            Alert::error('Terjadi Kesalahan' , $result);
            return redirect('/customer/change-password');
        }

    
    }
}
