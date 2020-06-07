@extends('layouts.login')
@section('body')
    <div class="login-box">
        {{--<div class="login-logo">
            <a href="../../index2.html"><b>Admin</b>LTE</a>
        </div>--}}
        <div class="card">
            <div class="card-body login-card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <p class="login-box-msg">{{ __('Reset Password') }}</p>

                <form action="{{ route('password.email') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input id="email" type="email" placeholder="{{ __('E-Mail Address') }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">{{ __('Send Password Reset Link') }}</button>
                        </div>
                    </div>
                </form>

                <p class="mt-3 mb-1">
                    <a href="{{ route('login') }}">{{ __('Login') }}</a>
                </p>
                {{-- <p class="mb-0">
                    <a href="register.html" class="text-center">Register a new membership</a>
                </p> --}}
            </div>
        </div>
    </div>
@endsection