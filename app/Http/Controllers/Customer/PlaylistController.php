<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    public function show($book_id)
    {
        return view('web.customer.playlist.show');
    }
}
