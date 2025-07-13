@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-4 col-md-8 col-12 mx-auto">
      <div class="card z-index-0 fadeIn3 fadeInBottom">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
            <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">{{ __('Login') }}</h4>
            <div class="row mt-3">
              <div class="col-2 text-center ms-auto">
                <a class="btn btn-link px-3" href="javascript:;">
                  <i class="fa fa-facebook text-white text-lg"></i>
                </a>
              </div>
              <div class="col-2 text-center px-1">
                <a class="btn btn-link px-3" href="javascript:;">
                  <i class="fa fa-github text-white text-lg"></i>
                </a>
              </div>
              <div class="col-2 text-center me-auto">
                <a class="btn btn-link px-3" href="javascript:;">
                  <i class="fa fa-google text-white text-lg"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('login') }}" role="form" class="text-start">
            @csrf
            <div class="input-group input-group-outline my-3">
              <input placeholder="{{ __('Email Address') }}" id="email" type="email" class="form-control" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
              @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="input-group input-group-outline mb-3">
              <input placeholder="{{ __('Password') }}" id="password" type="password" class="form-control" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
              @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-check form-switch d-flex align-items-center mb-3">
              <input class="form-check-input" type="checkbox" id="rememberMe"  name="remember" id="remember" {{ old('remember') ?  : '' }}checked>
              <label class="form-check-label mb-0 ms-3" for="rememberMe">{{ __('Remember Me') }}</label>
            </div>
            <div class="text-center">
              <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">{{ __('Login') }}</button>
            </div>
            <div class="text-center">
                @if (Route::has('password.request'))
                <a class="text-primary text-gradient" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('footer2')
    <footer
            class="text-center text-lg-start text-white"
            style="background-color: #343434"
            >
      <!-- Grid container -->
      <div class="container p-4 pb-0">
        <!-- Section: Links -->
        <section class="">
          <!--Grid row-->
          <div class="row">
            <!-- Grid column -->
            <div class="col-md-6 col-lg-3 col-xl-3 mx-auto mt-3">
              <h6 class="text-uppercase mb-4 font-weight-bold">
                Maps
              </h6>
              <p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3305.400267526742!2d-4.952918175426015!3d34.05925217315427!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd9ff38688abf90b%3A0x2149be7ab2a386ee!2sLOULIDI%20CAR!5e0!3m2!1sar!2sma!4v1683487318973!5m2!1sar!2sma" width="300" height="290" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </p>
            </div>
            <!-- Grid column -->
  
            <hr class="w-100 clearfix d-md-none" />

            <!-- Grid column -->
  
            <hr class="w-100 clearfix d-md-none" />
  
            <!-- Grid column -->
            <div class="col-md-6 col-lg-3 col-xl-3 mx-auto mt-3 text-center">
              <h6 class="text-uppercase mb-4 font-weight-bold">
                Horaires de travail
              </h6>
              <p>
                <a class="text-white">Lun : 9:00 – 6:00</a>
              </p>
              <p>
                <a class="text-white">Mar : 9:00 – 6:00</a>
              </p>
              <p>
                <a class="text-white">Mer : 9:00 – 6:00</a>
              </p>
              <p>
                <a class="text-white">Jeu : 9:00 – 6:00</a>
              </p>
              <p>
                <a class="text-white">Ven : 9:00 – 6:00</a>
              </p>
              <p>
                <a class="text-white">Sam : 9:00 -6:00</a>
              </p>
              <p>
                <a class="text-white">Dim : Fermé</a>
              </p>
            </div>
  
            <!-- Grid column -->
            <hr class="w-100 clearfix d-md-none" />
  
            <!-- Grid column -->
            <div class="col-md-6 col-lg-3 col-xl-3 mx-auto mt-3">
              <h6 id="contact-footer" class="text-uppercase mb-4 font-weight-bold">Contact</h6>
              <p><i class="fas fa-home mr-3" style="color: #e91e63;"></i> MAG N°8 N°6 RUE 44 BLED SKALIA DOUAR RIAFA, FES</p>
              <p><i class="fas fa-envelope mr-3" style="color: #e91e63;"></i> loulidicar@gmail.com</p>
              <p><i class="fas fa-phone mr-3" style="color: #e91e63;"></i> + 212 6 69 69 23 62</p>
              <p><i class="fas fa-tty mr-3" style="color: #e91e63;"></i> + 212 5 29 96 85 61</p>
            </div>
            <!-- Grid column -->
          </div>
          <!--Grid row-->
        </section>
        <!-- Section: Links -->
  
        <hr class="my-3">
  
        <!-- Section: Copyright -->
        <section class="p-3 pt-0">
          <div class="row d-flex align-items-center">
            <!-- Grid column -->
            <div class="col-md-7 col-lg-8 text-center text-md-start">
              <!-- Copyright -->
              <div class="p-3">
                © 2025 Copyright:
                <a class="text-white" href="https://mdbootstrap.com/"
                   >MDBootstrap.com</a
                  >
              </div>
              <!-- Copyright -->
            </div>
            <!-- Grid column -->
  
            <!-- Grid column -->
            <div class="col-md-5 col-lg-4 ml-lg-0 text-center text-md-end">
              <!-- Facebook -->
              <a
                 class="btn btn-outline-light btn-floating m-1"
                 class="text-white"
                 role="button"
                 ><i class="fab fa-facebook-f"></i
                ></a>
  
              <!-- Twitter -->
              <a
                 class="btn btn-outline-light btn-floating m-1"
                 class="text-white"
                 role="button"
                 ><i class="fab fa-twitter"></i
                ></a>
  
              <!-- Google -->
              <a
                 class="btn btn-outline-light btn-floating m-1"
                 class="text-white"
                 role="button"
                 ><i class="fab fa-google"></i
                ></a>
  
              <!-- Instagram -->
              <a
                 class="btn btn-outline-light btn-floating m-1"
                 class="text-white"
                 role="button"
                 ><i class="fab fa-instagram"></i
                ></a>
            </div>
            <!-- Grid column -->
          </div>
        </section>
        <!-- Section: Copyright -->
      </div>
      <!-- Grid container -->
    </footer>
@endsection