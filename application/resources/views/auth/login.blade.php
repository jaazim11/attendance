@extends('layouts.auth')

@section('meta')
    <title>Log in | Workday Time Clock</title>
    <meta name="description" content="Workday Log in">
@endsection

@section('auth')
<div class="container">
    <div class="row justify-content-center">
        <div class="card col-md-6 auth-box">
            <div class="card-body text-center">
                <div class="logo text-center pt-4">
                    <img src="{{ asset('/assets/images/img/logo.png') }}" alt="Workday">
                </div> 
                <h6 class="mb-4 pt-2">{{ __("Log in to your account") }}</h6>
                <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate accept-charset="utf-8">
                    @csrf
                    
                    <div class="form-group text-left">
                        <label for="email">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="" autofocus required>

                         @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group text-left">
                        <label for="password">{{ __('Password') }}</label>
                        <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="" required>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary btn-block shadow-sm mb-4"> {{ __('Log in') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
