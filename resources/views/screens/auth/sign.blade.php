@extends('layouts.guest')
@section('content')
    <section class="signin-page account">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="block text-center">
                        <a class="logo" href="index.html">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="">
                        </a>
                        <h2 class="text-center">Create Your Account</h2>
                        <form action="{{route('register')}}" method="POST" class="text-left clearfix">
                            @csrf
                            <x-test placeholder=" First name" name="name" />
                            <x-test placeholder=" Last name" name="last_name" />
                            {{-- <x-test placeholder=" User name "/> --}}
                            <x-test type="email" placeholder=" Enter email" name="email" />
                            <x-test type="password" placeholder="Password" name="password" />
                            <x-test type="password" placeholder="Confirm Password" name="password_confirmation" />
                            <div class="text-center">
                                <button type="submit" class="btn btn-main text-center">Sign In</button>
                            </div>
                        </form>
                        <p class="mt-20">Already hava an account ?<a href="{{route('login')}}"> Login</a></p>
                        <p><a href="forget-password.html"> Forgot your password?</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
