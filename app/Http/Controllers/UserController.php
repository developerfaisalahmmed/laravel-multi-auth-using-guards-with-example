<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function user(){

//        https://pusher.com/tutorials/multiple-authentication-guards-laravel/
        Auth::guard('admin')->user();
    }

    public function login(Request $request){
//      $data = Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password]);
      return 'login';

    }
}
