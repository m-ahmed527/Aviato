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
                        <h2 class="text-center">Welcome Back</h2>
                        <form class="text-left clearfix" action="{{route('login')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <x-test type="email" placeholder="Email" name="email"/>
                                <x-test type="password" placeholder="Password" name="password"/>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-main text-center">Login</button>
                                </div>
                        </form>
                        <p class="mt-20">New in this site ?<a href="{{ route('register') }}"> Create New Account</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
