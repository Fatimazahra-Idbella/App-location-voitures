@extends('layouts.app')

@section('head')
<style>
    /* Professional Corporate Color Palette */
    :root {
        /* Primary Colors */
        --primary-color: #0A1628;          /* Deep Navy Blue - Professional */
        --secondary-color: #1E40AF;        /* Professional Blue - Corporate */
        --accent-color: #F59E0B;           /* Premium Gold - Luxury */
        --accent-light: #FEF3C7;          /* Light Gold */
        --accent-red: #DC2626;             /* Professional Red for CTAs */
        
        /* Dark Theme Colors */
        --dark-primary: #0F172A;           /* Very Dark Navy */
        --dark-secondary: #1E293B;         /* Dark Slate */
        --dark-tertiary: #334155;          /* Medium Slate */
        
        /* Background Colors */
        --background-primary: #FFFFFF;     /* Pure White */
        --background-glass: rgba(255, 255, 255, 0.95);
        --background-dark: #0F172A;       /* Dark Navy */
        
        /* Text Colors */
        --text-primary: #1F2937;          /* Dark Charcoal */
        --text-secondary: #6B7280;        /* Medium Gray */
        --text-light: #9CA3AF;            /* Light Gray */
        --text-white: #FFFFFF;            /* Pure White */
        --text-muted: #64748B;            /* Muted Gray */
        
        /* Shadows */
        --shadow-glass: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        --shadow-premium: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        --shadow-luxury: 0 32px 64px rgba(0, 0, 0, 0.15);
        
        /* Transitions */
        --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        --transition-smooth: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        
        /* Border Radius */
        --border-radius: 12px;
        --border-radius-lg: 16px;
        --border-radius-xl: 24px;
    }

    /* Split Screen Layout */
    .register-split-screen {
        min-height: 100vh;
        display: grid;
        grid-template-columns: 1fr 1fr;
        background: var(--background-primary);
    }

    /* Left Side - Welcome Design */
    .welcome-section {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 50%, var(--dark-primary) 100%);
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 3rem;
        overflow: hidden;
    }

    .welcome-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            radial-gradient(circle at 20% 20%, rgba(245, 158, 11, 0.15) 0%, transparent 50%),
            radial-gradient(circle at 80% 80%, rgba(30, 64, 175, 0.15) 0%, transparent 50%),
            url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="welcomeGrid" width="20" height="20" patternUnits="userSpaceOnUse"><path d="M 20 0 L 0 0 0 20" fill="none" stroke="rgba(255,255,255,0.05)" stroke-width="1"/></pattern></defs><rect width="100" height="100" fill="url(%23welcomeGrid)"/></svg>');
        opacity: 0.8;
    }

    .welcome-section::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('https://images.unsplash.com/photo-1449824913935-59a10b8d2000?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80') center/cover no-repeat;
        opacity: 0.1;
        z-index: 1;
    }

    .welcome-content {
        position: relative;
        z-index: 3;
        text-align: center;
        color: var(--text-white);
        max-width: 500px;
    }

    .welcome-logo {
        font-size: 3.5rem;
        font-weight: 900;
        margin-bottom: 1rem;
        background: linear-gradient(135deg, var(--accent-color), #FCD34D);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        text-transform: uppercase;
        letter-spacing: 3px;
        text-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    }

    .welcome-title {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        line-height: 1.2;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    }

    .welcome-subtitle {
        font-size: 1.3rem;
        font-weight: 300;
        margin-bottom: 2rem;
        opacity: 0.9;
        line-height: 1.5;
    }

    .welcome-description {
        font-size: 1.1rem;
        opacity: 0.8;
        line-height: 1.6;
        margin-bottom: 3rem;
    }

    .welcome-benefits {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1.5rem;
        margin-top: 2rem;
    }

    .benefit-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem;
        background: rgba(255, 255, 255, 0.1);
        border-radius: var(--border-radius);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: var(--transition);
    }

    .benefit-item:hover {
        background: rgba(255, 255, 255, 0.15);
        transform: translateY(-2px);
    }

    .benefit-icon {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--accent-color), #D97706);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--text-white);
        font-size: 1.3rem;
        box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
    }

    .benefit-text {
        flex: 1;
    }

    .benefit-title {
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 0.25rem;
    }

    .benefit-desc {
        font-size: 0.9rem;
        opacity: 0.8;
    }

    /* Right Side - Register Form */
    .register-section {
        background: var(--background-primary);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 3rem;
        position: relative;
        overflow-y: auto;
    }

    .register-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, #F8FAFC 0%, #FFFFFF 100%);
        opacity: 0.8;
    }

    .register-container {
        position: relative;
        z-index: 2;
        width: 100%;
        max-width: 500px;
    }

    .register-card {
        background: var(--background-glass);
        backdrop-filter: blur(30px);
        border-radius: var(--border-radius-xl);
        padding: 3rem;
        box-shadow: var(--shadow-luxury);
        border: 1px solid rgba(255, 255, 255, 0.3);
        position: relative;
    }

    .register-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--accent-color), var(--primary-color));
        border-radius: var(--border-radius-xl) var(--border-radius-xl) 0 0;
    }

    .register-header {
        text-align: center;
        margin-bottom: 2.5rem;
    }

    .register-title {
        font-size: 2.2rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 0.5rem;
        letter-spacing: -0.5px;
    }

    .register-subtitle {
        color: var(--text-secondary);
        font-size: 1.1rem;
        font-weight: 400;
        margin-bottom: 2rem;
    }

    /* Social Register */
    .social-register {
        margin-bottom: 2rem;
    }

    .social-buttons {
        display: flex;
        gap: 1rem;
        justify-content: center;
        margin-bottom: 1.5rem;
    }

    .social-btn {
        width: 55px;
        height: 55px;
        border-radius: var(--border-radius-lg);
        background: var(--background-primary);
        border: 2px solid #E5E7EB;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--text-secondary);
        text-decoration: none;
        transition: var(--transition);
        font-size: 1.3rem;
        box-shadow: var(--shadow-premium);
    }

    .social-btn:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-luxury);
        text-decoration: none;
    }

    .social-btn.facebook:hover { 
        background: #1877F2; 
        color: var(--text-white); 
        border-color: #1877F2; 
    }

    .social-btn.google:hover { 
        background: #EA4335; 
        color: var(--text-white); 
        border-color: #EA4335; 
    }

    .social-btn.github:hover { 
        background: #333; 
        color: var(--text-white); 
        border-color: #333; 
    }

    /* Form Divider */
    .form-divider {
        position: relative;
        text-align: center;
        margin: 2rem 0;
    }

    .form-divider::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        height: 1px;
        background: linear-gradient(90deg, transparent, #E5E7EB, transparent);
    }

    .form-divider span {
        background: var(--background-glass);
        color: var(--text-muted);
        padding: 0 1.5rem;
        font-size: 0.95rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* Form Elements */
    .form-group {
        margin-bottom: 1.5rem;
        position: relative;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
    }

    .form-label {
        display: block;
        font-size: 0.95rem;
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .form-input-wrapper {
        position: relative;
    }

    .form-input {
        width: 100%;
        padding: 1.25rem 1.5rem;
        padding-left: 3.5rem;
        border: 2px solid #E5E7EB;
        border-radius: var(--border-radius-lg);
        font-size: 1rem;
        background: var(--background-primary);
        color: var(--text-primary);
        transition: var(--transition);
        font-weight: 500;
        box-shadow: var(--shadow-premium);
    }

    .form-input:focus {
        outline: none;
        border-color: var(--accent-color);
        box-shadow: 0 0 0 4px rgba(245, 158, 11, 0.1), var(--shadow-premium);
        background: #FFFBEB;
    }

    .form-input.is-invalid {
        border-color: var(--accent-red);
        box-shadow: 0 0 0 4px rgba(220, 38, 38, 0.1), var(--shadow-premium);
    }

    .form-select {
        width: 100%;
        padding: 1.25rem 1.5rem;
        padding-left: 3.5rem;
        border: 2px solid #E5E7EB;
        border-radius: var(--border-radius-lg);
        font-size: 1rem;
        background: var(--background-primary);
        color: var(--text-primary);
        transition: var(--transition);
        font-weight: 500;
        box-shadow: var(--shadow-premium);
        cursor: pointer;
        appearance: none;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
        background-position: right 1rem center;
        background-repeat: no-repeat;
        background-size: 1.5em 1.5em;
    }

    .form-select:focus {
        outline: none;
        border-color: var(--accent-color);
        box-shadow: 0 0 0 4px rgba(245, 158, 11, 0.1), var(--shadow-premium);
        background: #FFFBEB;
    }

    .form-icon {
        position: absolute;
        left: 1.25rem;
        top: 50%;
        transform: translateY(-50%);
        color: var(--text-muted);
        font-size: 1.2rem;
        transition: var(--transition);
    }

    .form-input:focus + .form-icon,
    .form-select:focus + .form-icon {
        color: var(--accent-color);
    }

    .invalid-feedback {
        color: var(--accent-red);
        font-size: 0.85rem;
        margin-top: 0.5rem;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    /* Role Selection */
    .role-selection {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .role-option {
        position: relative;
    }

    .role-input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    .role-card {
        padding: 1.5rem;
        border: 2px solid #E5E7EB;
        border-radius: var(--border-radius-lg);
        text-align: center;
        cursor: pointer;
        transition: var(--transition);
        background: var(--background-primary);
        box-shadow: var(--shadow-premium);
    }

    .role-card:hover {
        border-color: var(--accent-color);
        transform: translateY(-2px);
        box-shadow: var(--shadow-luxury);
    }

    .role-input:checked + .role-card {
        border-color: var(--accent-color);
        background: var(--accent-light);
        transform: translateY(-2px);
        box-shadow: var(--shadow-luxury);
    }

    .role-icon {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--accent-color), #D97706);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--text-white);
        font-size: 1.5rem;
        margin: 0 auto 1rem;
        transition: var(--transition);
    }

    .role-input:checked + .role-card .role-icon {
        transform: scale(1.1);
    }

    .role-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 0.5rem;
    }

    .role-desc {
        font-size: 0.9rem;
        color: var(--text-secondary);
    }

    /* Buttons */
    .btn-register {
        width: 100%;
        background: linear-gradient(135deg, var(--accent-color), #D97706);
        color: var(--text-white);
        border: none;
        padding: 1.25rem 2rem;
        border-radius: var(--border-radius-lg);
        font-size: 1.1rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: var(--transition);
        cursor: pointer;
        margin-bottom: 1.5rem;
        position: relative;
        overflow: hidden;
        box-shadow: var(--shadow-premium);
    }

    .btn-register::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: var(--transition);
    }

    .btn-register:hover::before {
        left: 100%;
    }

    .btn-register:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-luxury);
    }

    .btn-login {
        width: 100%;
        background: transparent;
        color: var(--primary-color);
        border: 2px solid var(--primary-color);
        padding: 1.25rem 2rem;
        border-radius: var(--border-radius-lg);
        font-size: 1.1rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: var(--transition);
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        text-align: center;
        margin-bottom: 1.5rem;
        position: relative;
        overflow: hidden;
        box-shadow: var(--shadow-premium);
    }

    .btn-login::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 0;
        height: 100%;
        background: var(--primary-color);
        transition: var(--transition);
        z-index: -1;
    }

    .btn-login:hover::before {
        width: 100%;
    }

    .btn-login:hover {
        color: var(--text-white);
        text-decoration: none;
        transform: translateY(-3px);
        box-shadow: var(--shadow-luxury);
    }

    /* Terms and Privacy */
    .terms-privacy {
        text-align: center;
        font-size: 0.9rem;
        color: var(--text-secondary);
        line-height: 1.5;
    }

    .terms-privacy a {
        color: var(--accent-color);
        text-decoration: none;
        font-weight: 600;
        transition: var(--transition);
    }

    .terms-privacy a:hover {
        color: #D97706;
        text-decoration: underline;
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .register-split-screen {
            grid-template-columns: 1fr;
        }
        
        .welcome-section {
            min-height: 40vh;
            padding: 2rem;
        }
        
        .welcome-title {
            font-size: 2rem;
        }
        
        .welcome-logo {
            font-size: 2.5rem;
        }
        
        .register-section {
            padding: 2rem 1rem;
        }
    }

    @media (max-width: 768px) {
        .welcome-section {
            min-height: 35vh;
            padding: 1.5rem;
        }
        
        .welcome-title {
            font-size: 1.8rem;
        }
        
        .welcome-logo {
            font-size: 2rem;
        }
        
        .register-card {
            padding: 2rem 1.5rem;
        }
        
        .form-row {
            grid-template-columns: 1fr;
        }
        
        .role-selection {
            grid-template-columns: 1fr;
        }
        
        .social-buttons {
            gap: 0.75rem;
        }
        
        .social-btn {
            width: 50px;
            height: 50px;
        }
    }

    /* Animations */
    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-50px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(50px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .welcome-content {
        animation: slideInLeft 0.8s ease-out;
    }

    .register-card {
        animation: slideInRight 0.8s ease-out;
    }

    .benefit-item {
        animation: fadeInUp 0.6s ease-out forwards;
        opacity: 0;
    }

    .benefit-item:nth-child(1) { animation-delay: 0.2s; }
    .benefit-item:nth-child(2) { animation-delay: 0.3s; }
    .benefit-item:nth-child(3) { animation-delay: 0.4s; }
    .benefit-item:nth-child(4) { animation-delay: 0.5s; }

    /* Loading Animation */
    .btn-register.loading {
        pointer-events: none;
        opacity: 0.8;
    }

    .btn-register.loading::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 20px;
        height: 20px;
        margin: -10px 0 0 -10px;
        border: 2px solid transparent;
        border-top: 2px solid var(--text-white);
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>
@endsection

@section('content')
<div class="register-split-screen">
    <!-- Left Side - Welcome Section -->
    <div class="welcome-section">
        <div class="welcome-content">
            <h1 class="welcome-logo">LOULIDI</h1>
            <h2 class="welcome-title">Join Our Premium Car Rental Community</h2>
            <p class="welcome-subtitle">Create Your Account Today</p>
            <p class="welcome-description">
                Join thousands of satisfied customers who trust us for their transportation needs. 
                Create your account and unlock exclusive benefits and premium services.
            </p>
            
            <div class="welcome-benefits">
                <div class="benefit-item">
                    <div class="benefit-icon">
                        <i class="fas fa-crown"></i>
                    </div>
                    <div class="benefit-text">
                        <div class="benefit-title">Exclusive Member Benefits</div>
                        <div class="benefit-desc">Access to premium vehicles and special discounts</div>
                    </div>
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="benefit-text">
                        <div class="benefit-title">Priority Booking</div>
                        <div class="benefit-desc">Skip the wait with priority reservation system</div>
                    </div>
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div class="benefit-text">
                        <div class="benefit-title">Comprehensive Insurance</div>
                        <div class="benefit-desc">Full coverage protection for peace of mind</div>
                    </div>
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <div class="benefit-text">
                        <div class="benefit-title">24/7 Premium Support</div>
                        <div class="benefit-desc">Dedicated customer service whenever you need</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Side - Register Section -->
    <div class="register-section">
        <div class="register-container">
            <div class="register-card">
                <div class="register-header">
                    <h3 class="register-title">Create Account</h3>
                    <p class="register-subtitle">Join our premium car rental service</p>
                </div>

                <!-- Social Register -->
                <div class="social-register">
                    <div class="social-buttons">
                        <a href="javascript:;" class="social-btn facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="javascript:;" class="social-btn google">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="javascript:;" class="social-btn github">
                            <i class="fab fa-github"></i>
                        </a>
                    </div>
                    
                    <div class="form-divider">
                        <span>Or register with email</span>
                    </div>
                </div>

                <!-- Register Form -->
                <form method="POST" action="{{ route('register') }}" role="form" id="registerForm">
                    @csrf
                    
                    <!-- Name Fields -->
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">{{ __('First Name') }}</label>
                            <div class="form-input-wrapper">
                                <input 
                                    id="name" 
                                    type="text" 
                                    class="form-input @error('name') is-invalid @enderror" 
                                    name="name" 
                                    value="{{ old('name') }}" 
                                    required 
                                    autocomplete="name" 
                                    autofocus
                                    placeholder="Enter your first name"
                                >
                                <i class="fas fa-user form-icon"></i>
                            </div>
                            @error('name')
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle"></i>
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">{{ __('Last Name') }}</label>
                            <div class="form-input-wrapper">
                                <input 
                                    id="prenom" 
                                    type="text" 
                                    class="form-input @error('prenom') is-invalid @enderror" 
                                    name="prenom" 
                                    value="{{ old('prenom') }}" 
                                    required 
                                    autocomplete="prenom"
                                    placeholder="Enter your last name"
                                >
                                <i class="fas fa-user form-icon"></i>
                            </div>
                            @error('prenom')
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle"></i>
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                    </div>
                    
                    <!-- Username -->
                    <div class="form-group">
                        <label class="form-label">{{ __('Username') }}</label>
                        <div class="form-input-wrapper">
                            <input 
                                id="username" 
                                type="text" 
                                class="form-input @error('username') is-invalid @enderror" 
                                name="username" 
                                value="{{ old('username') }}" 
                                required 
                                autocomplete="username"
                                placeholder="Choose a unique username"
                            >
                            <i class="fas fa-at form-icon"></i>
                        </div>
                        @error('username')
                        <div class="invalid-feedback">
                            <i class="fas fa-exclamation-circle"></i>
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                    
                    <!-- Email -->
                    <div class="form-group">
                        <label class="form-label">{{ __('Email Address') }}</label>
                        <div class="form-input-wrapper">
                            <input 
                                id="email" 
                                type="email" 
                                class="form-input @error('email') is-invalid @enderror" 
                                name="email" 
                                value="{{ old('email') }}" 
                                required 
                                autocomplete="email"
                                placeholder="Enter your email address"
                            >
                            <i class="fas fa-envelope form-icon"></i>
                        </div>
                        @error('email')
                        <div class="invalid-feedback">
                            <i class="fas fa-exclamation-circle"></i>
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                    
                    <!-- Password Fields -->
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">{{ __('Password') }}</label>
                            <div class="form-input-wrapper">
                                <input 
                                    id="password" 
                                    type="password" 
                                    class="form-input @error('password') is-invalid @enderror" 
                                    name="password" 
                                    required 
                                    autocomplete="new-password"
                                    placeholder="Create password"
                                >
                                <i class="fas fa-lock form-icon"></i>
                            </div>
                            @error('password')
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle"></i>
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">{{ __('Confirm Password') }}</label>
                            <div class="form-input-wrapper">
                                <input 
                                    id="password-confirm" 
                                    type="password" 
                                    class="form-input" 
                                    name="password_confirmation" 
                                    required 
                                    autocomplete="new-password"
                                    placeholder="Confirm password"
                                >
                                <i class="fas fa-lock form-icon"></i>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Role Selection -->
                    <div class="form-group">
                        <label class="form-label">{{ __('Account Type') }}</label>
                        <div class="role-selection">
                            <div class="role-option">
                                <input type="radio" id="role-client" name="role" value="client" class="role-input" required>
                                <label for="role-client" class="role-card">
                                    <div class="role-icon">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="role-title">Client</div>
                                    <div class="role-desc">Rent vehicles for personal use</div>
                                </label>
                            </div>
                            <div class="role-option">
                                <input type="radio" id="role-admin" name="role" value="admin" class="role-input" required>
                                <label for="role-admin" class="role-card">
                                    <div class="role-icon">
                                        <i class="fas fa-crown"></i>
                                    </div>
                                    <div class="role-title">Admin</div>
                                    <div class="role-desc">Manage fleet and operations</div>
                                </label>
                            </div>
                        </div>
                        @error('role')
                        <div class="invalid-feedback">
                            <i class="fas fa-exclamation-circle"></i>
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn-register" id="registerBtn">
                        {{ __('Create Account') }}
                    </button>
                    
                    <a href="{{ route('login') }}" class="btn-login">
                        {{ __('Already Have Account? Sign In') }}
                    </a>
                    
                    <div class="terms-privacy">
                        By creating an account, you agree to our 
                        <a href="#">Terms of Service</a> and 
                        <a href="#">Privacy Policy</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const registerForm = document.getElementById('registerForm');
    const registerBtn = document.getElementById('registerBtn');
    
    // Form submission with loading state
    registerForm.addEventListener('submit', function(e) {
        registerBtn.classList.add('loading');
        registerBtn.textContent = 'Creating Account...';
    });
    
    // Enhanced form validation
    const inputs = document.querySelectorAll('.form-input');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('focused');
        });
        
        input.addEventListener('blur', function() {
            if (!this.value) {
                this.parentElement.classList.remove('focused');
            }
        });
        
        // Real-time validation
        input.addEventListener('input', function() {
            if (this.classList.contains('is-invalid')) {
                this.classList.remove('is-invalid');
                const feedback = this.parentElement.parentElement.querySelector('.invalid-feedback');
                if (feedback) {
                    feedback.style.display = 'none';
                }
            }
        });
    });
    
    // Password confirmation validation
    const password = document.getElementById('password');
    const passwordConfirm = document.getElementById('password-confirm');
    
    passwordConfirm.addEventListener('input', function() {
        if (password.value !== this.value) {
            this.setCustomValidity('Passwords do not match');
        } else {
            this.setCustomValidity('');
        }
    });
    
    // Social register handlers
    document.querySelectorAll('.social-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            // Add your social register logic here
            console.log('Social register clicked:', this.classList[1]);
        });
    });
    
    // Role selection enhancement
    const roleInputs = document.querySelectorAll('.role-input');
    roleInputs.forEach(input => {
        input.addEventListener('change', function() {
            // Remove active state from all cards
            document.querySelectorAll('.role-card').forEach(card => {
                card.classList.remove('active');
            });
            
            // Add active state to selected card
            if (this.checked) {
                this.nextElementSibling.classList.add('active');
            }
        });
    });
    
    // Benefit items animation on scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animationPlayState = 'running';
            }
        });
    }, observerOptions);
    
    document.querySelectorAll('.benefit-item').forEach(item => {
        observer.observe(item);
    });
});
</script>
@endsection
