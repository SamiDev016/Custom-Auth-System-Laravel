<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthManager extends Controller
{
    public function login(){
        return view("login");
    }

    public function register(){
        return view("register");
    }

    public function loginPost(Request $request){

        $this->validate($request,[
            "email"=> "required",
            "password"=> "required"
        ]);

        $credentials = $request->only("email","password");

        if(Auth::attempt($credentials)){
            return redirect()->intended(route("home"));
        }

        return redirect(route('login'))->with("error","Error in Login ");
    }

    public function registerPost(Request $request){

    }
}
