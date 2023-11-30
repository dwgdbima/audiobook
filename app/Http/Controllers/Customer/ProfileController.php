<?php

namespace App\Http\Controllers\Customer;

use App\Contract\Repository\UserRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
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
    
     /**
     * Change password view
     */
    public function changePasswordView()
    {
        return view('web.customer.profile.change-password');
    }

      /**
     * Profile view
     */
    public function profile()
    {

        return view('web.customer.profile.profile' , [
            'user' => auth()->user()
        ]);
    }


    /**
     * Edit profile view
     */
    public function editProfileView()
    {
        return view('web.customer.profile.edit-profile' , [
            'user' => auth()->user()
        ]);
    }


    
    public function editProfile(UpdateProfileCustomerRequest $request)
    {
        $validatedData = $request->validated();

        if(isset($validatedData['profile_picture'])){
            Storage::delete(auth()->user()->profile_picture);
            $validatedData['profile_picture'] = $validatedData['profile_picture']->store('Customer/Profile');
            $validatedData['profile_picture'] = 'storage/' . $validatedData['profile_picture'];
        }
       
        $this->userRepositoryService->update_profile($validatedData);
        Alert::success('Berhasil' , 'Profile berhasil diperbarui');
        return back();
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
            return back();
        }else{
            Alert::error('Terjadi Kesalahan' , $result);
            return back();
        }

    
    }
}
