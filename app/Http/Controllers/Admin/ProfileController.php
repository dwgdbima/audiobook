<?php

namespace App\Http\Controllers\Admin;

use App\Contract\Repository\UserRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UpdateProfileAdminRequest;
use App\Http\Requests\UpdateProfileCustomerRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{

    protected $userRepositoryService;
    protected $authService;

    public function __construct(UserRepositoryInterface $userRepositoryInterface, AuthService $authService)
    {
        $this->userRepositoryService = $userRepositoryInterface;
        $this->authService = $authService;
    }

    public function profile()
    {
        return view('web.admin.pages.profile' , [
            'user' => auth()->user()
        ]);
    }

    public function editProfileView()
    {
        return view('web.admin.pages.edit-profile' , [
            'user' => auth()->user()
        ]);
    }

    public function changePasswordView()
    {
        return view('web.admin.pages.change-password');
    }


    public function editProfile(UpdateProfileAdminRequest $request)
    {
        $validatedData = $request->validated();

        if(isset($validatedData['profile_picture'])){
            Storage::delete(auth()->user()->profile_picture);
            $validatedData['profile_picture'] = $validatedData['profile_picture']->store('Admin/Profile');
        }
       
        $this->userRepositoryService->update_profile($validatedData);
        Alert::success('Berhasil' , 'Profile berhasil diperbarui');
        return back();
    }


    public function changePassword(ChangePasswordRequest $request)
    {
        $validatedData = $request->validated();
        
        $result = $this->authService->changePassword($validatedData);
      
        if($result == true){
            Alert::success('Sukses' , 'Password berhasil dirubah');
            return back();
        }else{
            Alert::error('Terjadi Kesalahan' , $result);
            return back();
        }

    
    }
}
