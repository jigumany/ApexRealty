<?php

namespace App\Http\Controllers;

use App\Traits\AuthenticatesUsers;
use App\Providers\RouteServiceProvider;


class LoginController extends Controller
{
    
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
