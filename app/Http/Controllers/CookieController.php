<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CookieController extends Controller
{
    public function setCookie(Request $request)
    {
        $response = new Response('success', 200);
        $response->withCookie('testCookie', 'test data');
        return $response;
    }
}
