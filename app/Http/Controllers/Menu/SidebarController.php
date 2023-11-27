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
}
