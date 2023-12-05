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

                        <p class="mt-20"><a href="{{ route('login') }}">Back to log in</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
