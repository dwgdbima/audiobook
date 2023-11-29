<?php

namespace App\Http\Controllers\Admin\Menu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NavbarController extends Controller
{
    public function setting()
    {
        return view('web.admin.pages.setting');
    }


    public function change_password_view()
    {
        return view('web.admin.pages.change-password');
    }
}
