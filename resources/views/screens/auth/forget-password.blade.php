@extends('layouts.app')
@section('content')
    <section class="forget-password-page account">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="block text-center">
                        <a class="logo" href="index.html">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="">
                        </a>
                        <h2 class="text-center">Welcome Back</h2>
                        @if (session()->has('success'))
                        <div class="text-success">{{session('success')}}</div>
                        @endif

                        @if (session()->has('error'))
                        <div class="text-success">{{session('error')}}</div>

                        @endif
                        <form class="text-left clearfix" action="{{ route('forget.password') }}" method="POST">
                            @csrf
                            <p>Please enter the email address for your account. A verification code will be sent to you.
                                Once you have received the verification code, you will be able to choose a new password for
                                your account.</p>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                    placeholder="Account email address">
                            </div>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="text-center">
                                <button type="submit" class="btn btn-main text-center">Request password reset</button>
                            </div>
                        </form>
                        <p class="mt-20"><a href="{{ route('login') }}">Back to log in</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
