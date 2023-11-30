<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Traits\Auth\HasAuth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use HasAuth;
    function loginForm(){
        return view('screens.auth.login');
    }


    // gpt code
    // public function login(LoginRequest $request) {
    //     $credentials = $request->sanitized();

    //     if (Auth::attempt($credentials)) {
    //         // Authentication successful, redirect to the 'index' route
    //         return redirect(route('index'));
    //     }

    //     // Authentication failed, redirect back with an error message
    //     return back()->with('error', 'Login Failed');
    // }


    public function login(LoginRequest $request){
        // if($request){
        return $this->authenticate($request->sanitized());
        //     return redirect(route('index'));
        // // }
        //     return back()->with('error', 'Login Failed');

    }

    function registerForm()  {
        return view('screens.auth.sign');
    }


    public function register(RegisterRequest $request){
        $user=User::create($request->sanitized());
        // dd($user);
        if($user){
            $this->authenticate(['email'=> $request->email, 'password'=> $request->password]);
            return redirect(route('index'));
        }
        // return back()->with('error', 'User Registration Failed');


    }

    public function logout()
    {
        Auth::logout();
        return back();
    }


}
