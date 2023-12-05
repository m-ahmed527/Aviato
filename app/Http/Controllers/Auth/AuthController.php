<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Traits\Auth\HasAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\PasswordResetToken;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Illuminate\Support\Facades\URL;
use Mail;


class AuthController extends Controller
{
    use HasAuth;
    function loginForm()
    {
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


    public function login(LoginRequest $request)
    {
        // if($request){
        return $this->authenticate($request->sanitized());
        //     return redirect(route('index'));
        // // }
        //     return back()->with('error', 'Login Failed');

    }

    function registerForm()
    {
        return view('screens.auth.sign');
    }


    public function register(RegisterRequest $request)
    {
        $user = User::create($request->sanitized());
        // dd($user);
        if ($user) {
            $this->authenticate(['email' => $request->email, 'password' => $request->password]);
            return redirect(route('index'));
        }
        // return back()->with('error', 'User Registration Failed');


    }

    public function logout()
    {
        Auth::logout();
        return back();
    }

    public function forgetPassword()
    {
        return view('screens.auth.forget-password');
    }

    public function forgetPasswordPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);
        $user = User::where('email', $request->email)->get();

        try {
            //code...

            if (count($user) > 0) {
                $token = Str::random(34);
                // $domain = URL::to('/');
                // $url = $domain . 'reset-password?token=' . $token;

                $data = ['token' => $token, 'email' => $request->email, 'title' => 'Password Reset', 'body' => 'Please Click the Link below to reset your password'];
                Mail::send('forgetpasswordmail', ['data' => $data], function ($message) use ($data) {
                    $message->to($data['email'])
                        ->subject($data['title']);
                });

                PasswordResetToken::updateOrCreate(
                    ['email' => $request->email],
                    [
                        'email' => $request->email,
                        'token' => $token,
                        'created_at' => Carbon::now(),
                    ]
                );
                return back()->with('success', 'please check Your Email');
            } else {
                return back()->with('error', 'Email does not exist');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function resetPassword(Request $request)
    {
        $resetData = PasswordResetToken::where('token', $request->token)->first();
        // dd($resetData->token);
        if (isset($request->token) && $resetData) {
            $user = User::where('email', $resetData->email)->first();
            // dd($user);
            return view('screens.auth.resetPassword', compact('user', 'resetData'));
        } else {
            return abort(404);
        }
    }
    public function resetPasswordPost(Request $request)
    {
        $request->validate([
            'password'=>'required|min:6|confirmed',
        ]);
        $user=User::where('email',$request->email)->first();

        // dd($user);
        $user->password=Hash::make($request->password);
        $user->update();

        PasswordResetToken::where('email',$user->email)->delete();
        return view('screens.auth.passwordupdated')->with('success', 'Password has been updated');

    }
}
