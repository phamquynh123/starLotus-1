
@extends('layouts.app')
@section('content1')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="{{ asset('')}}admin/img/img-01.png" alt="IMG">
            </div>

            <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                <span class="login100-form-title">
                    Member Login
                </span>
                @csrf
                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">

                    <input  class="input100" type="email" class="form-control" name="email" value="" required autocomplete="email" autofocus id="email">

                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                   <input  class="input100" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="current-password"t id="password">

                   @if ($errors->has('password'))
                   <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                </span>
            </div>

            <div class="container-login100-form-btn">
                <button class="login100-form-btn" type="submit">
                    Login
                </button>
            </div>

            <div class="text-center p-t-12">
                <span class="txt1">
                    Forgot
                </span>
                <a class="txt2" href="#">
                    Username / Password?
                </a>
            </div>

            <div class="text-center p-t-136">
                <a class="txt2" href="#">
                    Create your Account
                    <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                </a>
            </div>
        </form>
    </div>
</div>
</div>


@endsection