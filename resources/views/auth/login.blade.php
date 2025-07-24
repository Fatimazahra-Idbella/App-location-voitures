@extends('layouts.app')

@section('head')
<style>
    :root {
        --primary-color: #0A1628;
        --secondary-color: #1E40AF;
        --accent-color: #F59E0B;
        --accent-red: #DC2626;
        --background-primary: #FFFFFF;
        --background-secondary: #F8FAFC;
        --text-primary: #1F2937;
        --text-white: #FFFFFF;
        --border-color: #E5E7EB;
        --shadow-lg: 0 10px 15px -3px rgba(15, 23, 42, 0.1);
        --border-radius: 8px;
        --transition: all 0.3s ease;
    }

    .login-fullscreen {
        display: flex;
        height: 100vh;
        background: linear-gradient(to right, var(--background-secondary), var(--background-primary));
    }

    .login-left {
    flex: 1;
    background: url('/assets/img/porsche-911-carrera.jpg') no-repeat center center;
    background-size: cover;
    color: var(--text-white);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 3rem;
    text-align: center;
    position: relative;
}

.login-left::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0; bottom: 0;
    background: rgba(10, 22, 40, 0.75); /* Overlay to make text readable */
    z-index: 0;
}

.login-left h1,
.login-left p {
    color:rgb(202, 132, 10);
    position: relative;
    z-index: 1;
}


    .login-right {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: var(--background-primary);
        padding: 2rem;
    }

    .login-card {
        background: var(--background-primary);
        border-radius: var(--border-radius);
        box-shadow: var(--shadow-lg);
        border: 1px solid var(--border-color);
        padding: 2rem;
        max-width: 400px;
        width: 100%;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 600;
        color: var(--text-primary);
    }

    .form-input {
        width: 100%;
        padding: 0.75rem;
        border-radius: var(--border-radius);
        border: 1px solid var(--border-color);
    }

    .btn-login {
        width: 100%;
        background-color: var(--accent-color);
        color: var(--text-white);
        padding: 0.75rem;
        border: none;
        border-radius: var(--border-radius);
        font-weight: bold;
        cursor: pointer;
        transition: var(--transition);
    }

    .btn-login:hover {
        background-color: #d97706;
    }

    .btn-register {
        display: inline-block;
        margin-top: 1rem;
        width: 100%;
        padding: 0.75rem;
        text-align: center;
        border: 2px solid var(--primary-color);
        color: var(--primary-color);
        border-radius: var(--border-radius);
        transition: var(--transition);
        text-decoration: none;
    }

    .btn-register:hover {
        background-color: var(--primary-color);
        color: var(--text-white);
    }
      /* Footer Styles */
    .professional-footer {
        background: #0A1628;
        color: var(--text-white);
        position: relative;
        overflow: hidden;
    }

    .professional-footer::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="footerPattern" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="1" fill="white" opacity="0.05"/></pattern></defs><rect width="100" height="100" fill="url(%23footerPattern)"/></svg>');
    }

    .footer-content {
        position: relative;
        z-index: 2;
        padding: 3rem 0 1rem;
    }

    .footer-section h6 {
        color: var(--accent-color);
        font-weight: 600;
        font-size: 1.1rem;
        margin-bottom: 1.5rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        position: relative;
        padding-bottom: 0.5rem;
    }

    .footer-section h6::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 40px;
        height: 2px;
        background: var(--accent-color);
        border-radius: 2px;
    }

    .footer-section p,
    .footer-section a {
        color: #CBD5E1;
        text-decoration: none;
        margin-bottom: 0.75rem;
        transition: var(--transition);
        font-size: 0.9rem;
        line-height: 1.6;
    }

    .footer-section a:hover {
        color: var(--accent-color);
        text-decoration: none;
    }

    .footer-section i {
        color: var(--accent-color);
        margin-right: 0.75rem;
        width: 18px;
    }

    .footer-map iframe {
        border-radius: var(--border-radius);
        border: 2px solid rgba(245, 158, 11, 0.2);
        width: 100%;
        height: 250px;
    }

    .social-links {
        display: flex;
        gap: 0.75rem;
        justify-content: center;
        margin-top: 1rem;
    }

    .social-link {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        background: rgba(245, 158, 11, 0.1);
        border: 1px solid rgba(245, 158, 11, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--accent-color);
        text-decoration: none;
        transition: var(--transition);
        backdrop-filter: blur(10px);
    }

    .social-link:hover {
        background: var(--accent-color);
        color: var(--text-white);
        text-decoration: none;
        transform: translateY(-2px);
        border-color: var(--accent-color);
        box-shadow: var(--shadow-lg);
    }

    .footer-bottom {
        border-top: 1px solid rgba(245, 158, 11, 0.2);
        padding: 1.5rem 0;
        margin-top: 2rem;
        text-align: center;
        color: #94A3B8;
        font-size: 0.9rem;
    }

    .footer-bottom a {
        color: var(--accent-color);
        text-decoration: none;
        font-weight: 500;
    }

    .footer-bottom a:hover {
        text-decoration: underline;
    }
</style>
@endsection

@section('content')
<div class="login-fullscreen">
    <div class="login-left">
        <h1>Welcome to Our Car Rental App</h1>
        <p>Discover the easiest and most secure way to rent your dream car. Fast, professional, and stylish service at your fingertips.</p>
    </div>

    <div class="login-right">
        <div class="login-card">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="email">Email</label>
                    <input id="email" type="email" class="form-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="password">Password</label>
                    <input id="password" type="password" class="form-input @error('password') is-invalid @enderror" name="password" required>
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">Remember Me</label>
                </div>

                <button type="submit" class="btn-login">Sign In</button>

                <a href="{{ route('register') }}" class="btn-register">Create Account</a>

                @if (Route::has('password.request'))
                    <div style="margin-top: 1rem; text-align: center;">
                        <a href="{{ route('password.request') }}">Forgot your password?</a>
                    </div>
                @endif
            </form>
        </div>
    </div>
</div>
@endsection

@section('footer2')
<footer class="professional-footer">
    <div class="footer-content">
        <div class="container">
            <div class="row">
                <!-- Map Section -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="footer-section">
                        <h6>Our Location</h6>
                        <div class="footer-map">
                            <iframe 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3305.400267526742!2d-4.952918175426015!3d34.05925217315427!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd9ff38688abf90b%3A0x2149be7ab2a386ee!2sLOULIDI%20CAR!5e0!3m2!1sar!2sma!4v1683487318973!5m2!1sar!2sma" 
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                </div>

                <!-- Business Hours -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="footer-section">
                        <h6>Business Hours</h6>
                        <p><i class="fas fa-clock"></i>Monday - Friday: 9:00 AM - 6:00 PM</p>
                        <p><i class="fas fa-clock"></i>Saturday: 9:00 AM - 6:00 PM</p>
                        <p><i class="fas fa-times-circle"></i>Sunday: Closed</p>
                        <p><i class="fas fa-phone-alt"></i>24/7 Emergency Support</p>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="col-lg-4 col-md-12 mb-4">
                    <div class="footer-section">
                        <h6>Contact Information</h6>
                        <p>
                            <i class="fas fa-map-marker-alt"></i>
                            MAG N°8 N°6 RUE 44 BLED SKALIA<br>
                            DOUAR RIAFA, FEZ, MOROCCO
                        </p>
                        <p>
                            <i class="fas fa-envelope"></i>
                            <a href="mailto:loulidicar@gmail.com">loulidicar@gmail.com</a>
                        </p>
                        <p>
                            <i class="fas fa-phone"></i>
                            <a href="tel:+212669692362">+212 6 69 69 23 62</a>
                        </p>
                        <p>
                            <i class="fas fa-phone-alt"></i>
                            <a href="tel:+212529968561">+212 5 29 96 85 61</a>
                        </p>
                        
                        <div class="social-links">
                            <a href="#" class="social-link">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="social-link">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#" class="social-link">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="social-link">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="mb-0">© 2025 <a href="#">Loulidi Car</a>. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-0">Crafted with excellence by <strong>Professional Team</strong></p>
                </div>
            </div>
        </div>
    </div>
</footer>
@endsection