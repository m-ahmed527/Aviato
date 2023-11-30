<?php
namespace App\Traits\Auth;

use Illuminate\Support\Facades\Auth;

trait HasAuth
{
    public function authenticate(array $credentials, $remember= false){
        if(Auth::attempt($credentials)){
            Auth::login(Auth::getLastAttempted(), $remember);
            return redirect(route("index"))->with('error', 'User Registration Failed');
        }
        return back()->with('error', 'User Registration Failed');
    }
}
