@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-4 col-md-8 col-12 mx-auto">
      <div class="card z-index-0 fadeIn3 fadeInBottom">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
            <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">{{ __('Reset Password') }}</h4>
          </div>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('password.email') }}" role="form" class="text-start">
            @csrf
            <div class="input-group input-group-outline my-3">
              <input placeholder="{{ __('Email Address') }}" id="email" type="email" class="form-control" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
              @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="text-center">
              <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">{{ __('Send Password Reset Link') }}</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
