@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-4 col-md-8 col-12 mx-auto">
      <div class="card z-index-0 fadeIn3 fadeInBottom">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
            <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">{{ __('Register') }}</h4>
          </div>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('register') }}" role="form" class="text-start">
            @csrf
            <div class="input-group input-group-outline my-3">
                <input placeholder="{{ __('Name') }}" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="input-group input-group-outline my-3">
                <input placeholder="{{ __('Prenom') }}"  id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom">

                @error('prenom')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="input-group input-group-outline my-3">
                <input placeholder="{{ __('username') }}"  id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">

                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="input-group input-group-outline my-3">
                <input placeholder="{{ __('Email Address') }}" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="input-group input-group-outline mb-3">
                <input placeholder="{{ __('Password') }}" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="input-group input-group-outline mb-3">
                <input placeholder="{{ __('Confirm Password') }}" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
            <div class="text-center">
              <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">{{ __('Register') }}</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
