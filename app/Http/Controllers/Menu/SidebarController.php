<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SidebarController extends Controller
{
    /**
     * All pages view
     */
    public function pages()
    {
        return view('web.customer.menu.sidebar-menu.pages');
    }

    /**
     * Profile view
     */
    public function profile()
    {

        return view('web.customer.menu.sidebar-menu.profile' , [
            'user' => auth()->user()
        ]);
    }


    /**
     * Edit profile view
     */
    public function edit_profile()
    {
        return view('web.customer.menu.sidebar-menu.edit-profile' , [
            'user' => auth()->user()
        ]);
    }
}
