<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            return redirect()->intended(route("home"))->with("success","Welcom User");
        }
        return redirect(route('login'))->with("error","Error in Login ");
    }

    public function registerPost(Request $request){
        $this->validate($request,[
            "name" => "required",
            "email"=> "required|email|unique:users",
            "password"=> "required"
        ]);

        $data["name"] = $request->name;
        $data["email"] = $request->email;
        $data["password"] = Hash::make($request->password);

        $user = User::create($data);
        if(!$user)
        {
            return redirect(route('register'))->with("error","ERROR");
        }
        return redirect(route('login'))->with("success","Login with your new account");

    }

    public function logout(){
        Auth::logout();
        return redirect(route("login"))->with("ok","You are Logout");
    }
}
