<?php

namespace App\Http\Controllers\Customer;

use App\Contract\Repository\UserRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileCustomerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    protected $userRepositoryService;
    public function __construct(UserRepositoryInterface $userRepositoryInterface)
    {
        $this->userRepositoryService = $userRepositoryInterface;
    }

    public function edit_profile(UpdateProfileCustomerRequest $request)
    {
        $validatedData = $request->validated();

        if(isset($validatedData['profile_picture'])){
            Storage::delete(auth()->user()->profile_picture);
            $validatedData['profile_picture'] = $validatedData['profile_picture']->store('Customer/Profile');
        }
       
        $this->userRepositoryService->update_profile($validatedData);
        Alert::success('Berhasil' , 'Profile berhasil diperbarui');
        return back();
    }
}
