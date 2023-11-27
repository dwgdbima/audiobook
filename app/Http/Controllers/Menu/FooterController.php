<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    /**
     * Setting view
     */
    public function setting()
    {
        return view('web.customer.menu.footer-menu.setting');
    }


     /**
     * Change password view
     */
    public function change_password()
    {
        return view('web.customer.menu.footer-menu.change-password');
    }


     /**
     * Support view
     */
    public function support()
    {
        return view('web.customer.menu.footer-menu.support');
    }


     /**
     * Pricacy & policy view
     */
    public function privacy_policy()
    {
        return view('web.customer.menu.footer-menu.privacy-policy');
    }
}
