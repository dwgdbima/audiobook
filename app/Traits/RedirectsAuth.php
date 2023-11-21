<?php
namespace App\Traits;

use App\Models\User;

trait RedirectsAuth
{
    /**
     * Redirect By Role.
     *
     * @return string
     */
    public function redirectByRole(User $user)
    {
        if($user->hasRole('admin')){
            return '/admin';
        }

        if($user->hasRole('customer')){
            return '/customer';
        }
    }
}