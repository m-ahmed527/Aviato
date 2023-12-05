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
                        <h2 class="text-center">Reset Your Password</h2>
                        @if (session()->has('success'))
                        <div class="text-success">{{session('success')}}</div>
                        @endif
                        <form action="{{ route('reset.passwordpost') }}" method="POST" class="text-left clearfix">
                            @csrf
                            <input type="hidden" name="token" value="{{ $resetData->token }}">
                            <x-test type="email" placeholder=" Enter email" name="email" value="{{ $user->email }}" />
                            <x-test type="password" placeholder="Password" name="password" />
                            <x-test type="password" placeholder="Confirm Password" name="password_confirmation" />
                            <div class="text-center">
                                <button type="submit" class="btn btn-main text-center">Reset Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
