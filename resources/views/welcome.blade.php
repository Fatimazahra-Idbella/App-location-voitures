@extends('layouts.app')

@section('head')
<style>
    .page-header .container.my-auto {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        height: 100%;
        padding: 0 1rem;
    }
    
    .page-header {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .hero-title {
        font-size: 3rem;
        color: white;
        font-weight: bold;
    }
    
    .hero-subtitle {
        font-size: 1.5rem;
        color: #eee;
    }

    /* Professional Corporate Color Palette */
    :root {
        /* Primary Colors */
        --primary-color: #0A1628;          /* Deep Navy Blue - Professional */
        --secondary-color: #1E40AF;        /* Professional Blue - Corporate */
        --accent-color: #F59E0B;           /* Premium Gold - Luxury */
        --accent-light: #FEF3C7;          /* Light Gold */
        
        /* Background Colors */
        --background-primary: #FFFFFF;     /* Pure White */
        --background-secondary: #F8FAFC;   /* Light Gray */
        --background-dark: #0F172A;       /* Dark Navy */
        
        /* Text Colors */
        --text-primary: #1F2937;          /* Dark Charcoal */
        --text-secondary: #6B7280;        /* Medium Gray */
        --text-light: #9CA3AF;            /* Light Gray */
        --text-white: #FFFFFF;            /* Pure White */
        
        /* Status Colors */
        --success-color: #059669;         /* Professional Green */
        --danger-color: #DC2626;          /* Professional Red */
        --warning-color: #D97706;         /* Professional Orange */
        --info-color: #2563EB;            /* Professional Blue */
        
        /* Utility Colors */
        --border-color: #E5E7EB;          /* Light Border */
        --border-dark: #374151;           /* Dark Border */
        --shadow-light: rgba(15, 23, 42, 0.08);
        --shadow-medium: rgba(15, 23, 42, 0.16);
        --shadow-dark: rgba(15, 23, 42, 0.24);
        
        /* Transitions and Effects */
        --transition-smooth: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        --transition-fast: all 0.2s ease-in-out;
        --border-radius: 12px;
        --border-radius-lg: 16px;
    }

    /* Reset and Base Styles */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html, body {
        width: 100%;
        height: 100%;
        overflow-x: hidden;
    }

    body {
        font-family: 'Inter', 'Segoe UI', -apple-system, BlinkMacSystemFont, sans-serif;
        line-height: 1.6;
        color: var(--text-primary);
        background: var(--background-primary);
        font-weight: 400;
    }

    /* Main Container */
    .main-container {
        width: 100vw;
        min-height: 100vh;
        position: relative;
        margin: 0;
        padding: 0;
    }

    /* Hero Section */
    .hero-section {
        width: 100vw;
        height: 100vh;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        background: 
            linear-gradient(135deg, rgba(10, 22, 40, 0.9), rgba(15, 23, 42, 0.8)),
            linear-gradient(45deg, rgba(30, 64, 175, 0.1), transparent),
            url('https://images.unsplash.com/photo-1544636331-e26879cd4d9b?ixlib=rb-4.0.3&auto=format&fit=crop&w=2400&q=80') center/cover no-repeat;
        margin: 0;
        padding: 0;
    }

    /* Hero Content */
    .hero-content {
        width: 100%;
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 3rem;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 6rem;
        align-items: center;
        height: auto;
    }

    /* Hero Text */
    .hero-text {
        color: var(--text-white);
        z-index: 2;
    }

    .hero-subtitle {
        font-size: 1rem;
        font-weight: 500;
        letter-spacing: 3px;
        text-transform: uppercase;
        margin-bottom: 1.5rem;
        opacity: 0.9;
        color: var(--accent-color);
    }

    .hero-title {
        font-size: 4.5rem;
        font-weight: 700;
        line-height: 1.1;
        margin-bottom: 2rem;
        letter-spacing: -2px;
        text-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
        color: var(--text-white);
    }

    .hero-title .highlight {
        color: var(--accent-color);
        font-weight: 800;
    }

    .hero-description {
        font-size: 1.2rem;
        font-weight: 400;
        line-height: 1.7;
        margin-bottom: 3rem;
        opacity: 0.9;
        max-width: 600px;
        color: #E2E8F0;
    }

    /* Hero Buttons */
    .hero-buttons {
        display: flex;
        gap: 2rem;
        margin-bottom: 2rem;
    }

    .btn-primary {
        background: var(--accent-color);
        color: var(--text-white);
        padding: 1.25rem 2.5rem;
        text-decoration: none;
        font-weight: 600;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        transition: var(--transition-smooth);
        border: 2px solid var(--accent-color);
        font-size: 0.9rem;
        box-shadow: 0 4px 20px rgba(245, 158, 11, 0.3);
        display: inline-block;
        border-radius: var(--border-radius);
    }

    .btn-primary:hover {
        background: #D97706;
        border-color: #D97706;
        color: var(--text-white);
        text-decoration: none;
        transform: translateY(-3px);
        box-shadow: 0 8px 30px rgba(245, 158, 11, 0.4);
    }

    .btn-secondary {
        background: transparent;
        color: var(--text-white);
        padding: 1.25rem 2.5rem;
        text-decoration: none;
        font-weight: 600;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        transition: var(--transition-smooth);
        border: 2px solid var(--text-white);
        font-size: 0.9rem;
        display: inline-block;
        border-radius: var(--border-radius);
    }

    .btn-secondary:hover {
        background: var(--text-white);
        color: var(--primary-color);
        text-decoration: none;
        transform: translateY(-3px);
        box-shadow: 0 8px 30px rgba(255, 255, 255, 0.3);
    }

    /* Hero Statistics */
    .hero-stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 3rem;
        background: rgba(10, 22, 40, 0.95);
        backdrop-filter: blur(20px);
        padding: 3rem;
        border: 1px solid rgba(245, 158, 11, 0.2);
        border-radius: var(--border-radius-lg);
        margin-top: 2rem;
    }

    .stat-item {
        text-align: center;
        color: var(--text-white);
    }

    .stat-number {
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 0.5rem;
        letter-spacing: -1px;
        color: var(--accent-color);
    }

    .stat-label {
        font-size: 0.9rem;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 1px;
        opacity: 0.8;
        color: #CBD5E1;
    }

    /* Services Section */
    .services-section {
        width: 100vw;
        padding: 8rem 0;
        background: var(--background-secondary);
        margin: 0;
    }

    .section-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 3rem;
    }

    .section-header {
        text-align: center;
        margin-bottom: 6rem;
    }

    .section-subtitle {
        font-size: 0.9rem;
        font-weight: 600;
        letter-spacing: 2px;
        text-transform: uppercase;
        color: var(--secondary-color);
        margin-bottom: 1rem;
    }

    .section-title {
        font-size: 3.5rem;
        font-weight: 700;
        color: var(--primary-color);
        letter-spacing: -1px;
        margin-bottom: 1.5rem;
    }

    .section-description {
        font-size: 1.1rem;
        color: var(--text-secondary);
        max-width: 700px;
        margin: 0 auto;
        line-height: 1.7;
    }

    .services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(380px, 1fr));
        gap: 3rem;
    }

    .service-item {
        text-align: center;
        padding: 3rem 2.5rem;
        background: var(--background-primary);
        transition: var(--transition-smooth);
        box-shadow: 0 4px 20px var(--shadow-light);
        border-radius: var(--border-radius-lg);
        border: 1px solid var(--border-color);
        position: relative;
        overflow: hidden;
    }

    .service-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--secondary-color), var(--accent-color));
        transform: scaleX(0);
        transition: var(--transition-smooth);
    }

    .service-item:hover::before {
        transform: scaleX(1);
    }

    .service-item:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 40px var(--shadow-medium);
        border-color: var(--accent-color);
    }

    .service-icon {
        width: 80px;
        height: 80px;
        margin: 0 auto 2rem;
        background: var(--primary-color);
        display: flex;
        align-items: center;
        justify-content: center;
        transition: var(--transition-smooth);
        border-radius: 50%;
    }

    .service-item:hover .service-icon {
        background: var(--secondary-color);
        transform: scale(1.1);
    }

    .service-icon i {
        font-size: 2rem;
        color: var(--text-white);
    }

    .service-title {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 1rem;
        letter-spacing: 0.5px;
        color: var(--primary-color);
    }

    .service-description {
        color: var(--text-secondary);
        line-height: 1.6;
        font-size: 1rem;
    }

    /* Fleet Section */
    .fleet-section {
        width: 100vw;
        padding: 8rem 0;
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--background-dark) 100%);
        color: var(--text-white);
        margin: 0;
    }

    .fleet-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(450px, 1fr));
        gap: 2rem;
        margin-top: 4rem;
    }

    .fleet-item {
        position: relative;
        height: 500px;
        overflow: hidden;
        cursor: pointer;
        transition: var(--transition-smooth);
        border-radius: var(--border-radius-lg);
        box-shadow: 0 8px 30px var(--shadow-dark);
    }

    .fleet-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 16px 50px var(--shadow-dark);
    }

    .fleet-image {
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        transition: var(--transition-smooth);
    }

    .fleet-item:hover .fleet-image {
        transform: scale(1.05);
    }

    .fleet-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(transparent, rgba(10, 22, 40, 0.95));
        color: var(--text-white);
        padding: 3rem 2.5rem 2rem;
        transform: translateY(20px);
        opacity: 0;
        transition: var(--transition-smooth);
    }

    .fleet-item:hover .fleet-overlay {
        transform: translateY(0);
        opacity: 1;
    }

    .fleet-name {
        font-size: 1.8rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        letter-spacing: 0.5px;
        color: var(--text-white);
    }

    .fleet-price {
        font-size: 1.1rem;
        font-weight: 600;
        opacity: 0.9;
        margin-bottom: 1rem;
        color: var(--accent-color);
    }

    .fleet-specs {
        display: flex;
        gap: 2rem;
        font-size: 0.9rem;
        opacity: 0.8;
        color: #CBD5E1;
    }

    /* Testimonials Section */
    .testimonials-section {
        width: 100vw;
        padding: 8rem 0;
        background: var(--background-primary);
        margin: 0;
    }

    .testimonials-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(380px, 1fr));
        gap: 3rem;
        margin-top: 4rem;
    }

    .testimonial-item {
        background: var(--background-primary);
        padding: 3rem 2.5rem;
        text-align: center;
        transition: var(--transition-smooth);
        box-shadow: 0 4px 20px var(--shadow-light);
        border-left: 4px solid var(--secondary-color);
        border-radius: var(--border-radius-lg);
        position: relative;
    }

    .testimonial-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 40px var(--shadow-medium);
        border-left-color: var(--accent-color);
    }

    .testimonial-text {
        font-size: 1.1rem;
        line-height: 1.7;
        color: var(--text-secondary);
        margin-bottom: 2rem;
        font-style: italic;
        position: relative;
    }

    .testimonial-text::before {
        content: '"';
        font-size: 4rem;
        color: var(--accent-color);
        position: absolute;
        top: -1rem;
        left: -1rem;
        font-family: serif;
    }

    .testimonial-author {
        font-weight: 600;
        color: var(--primary-color);
        margin-bottom: 0.5rem;
        font-size: 1rem;
    }

    .testimonial-role {
        font-size: 0.9rem;
        color: var(--text-light);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* Footer */
    .main-footer {
        width: 100vw;
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--background-dark) 100%);
        color: var(--text-white);
        padding: 6rem 0 2rem;
        margin: 0;
    }

    .footer-content {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 3rem;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 4rem;
        margin-bottom: 3rem;
    }

    .footer-section h3 {
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 2rem;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        color: var(--accent-color);
    }

    .footer-section a {
        color: #CBD5E1;
        text-decoration: none;
        display: block;
        margin-bottom: 1rem;
        transition: var(--transition-fast);
        font-size: 0.95rem;
    }

    .footer-section a:hover {
        color: var(--accent-color);
        padding-left: 8px;
    }

    .footer-section p {
        color: #CBD5E1;
        line-height: 1.6;
        font-size: 0.95rem;
    }

    .social-links {
        display: flex;
        gap: 1rem;
        margin-top: 2rem;
    }

    .social-link {
        width: 50px;
        height: 50px;
        background: rgba(245, 158, 11, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--accent-color);
        transition: var(--transition-smooth);
        text-decoration: none;
        border-radius: 50%;
        border: 1px solid rgba(245, 158, 11, 0.2);
    }

    .social-link:hover {
        background: var(--accent-color);
        color: var(--text-white);
        text-decoration: none;
        transform: translateY(-3px);
        border-color: var(--accent-color);
    }

    .footer-bottom {
        border-top: 1px solid rgba(245, 158, 11, 0.2);
        padding-top: 2rem;
        text-align: center;
        color: #94A3B8;
        font-size: 0.9rem;
    }

    /* Scroll Indicator */
    .scroll-indicator {
        position: absolute;
        bottom: 2rem;
        left: 50%;
        transform: translateX(-50%);
        color: var(--accent-color);
        animation: bounce 2s infinite;
        z-index: 10;
    }

    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% {
            transform: translateX(-50%) translateY(0);
        }
        40% {
            transform: translateX(-50%) translateY(-8px);
        }
        60% {
            transform: translateX(-50%) translateY(-4px);
        }
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .hero-content {
            grid-template-columns: 1fr;
            gap: 3rem;
            text-align: center;
            padding: 0 2rem;
        }
        
        .hero-title {
            font-size: 3.5rem;
        }
        
        .hero-stats {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.8rem;
        }
        
        .section-title {
            font-size: 2.5rem;
        }
        
        .services-grid {
            grid-template-columns: 1fr;
            gap: 2rem;
        }
        
        .fleet-grid {
            grid-template-columns: 1fr;
        }
        
        .testimonials-grid {
            grid-template-columns: 1fr;
        }
        
        .hero-buttons {
            flex-direction: column;
            gap: 1rem;
        }
        
        .btn-primary,
        .btn-secondary {
            width: 100%;
            text-align: center;
        }
        
        .hero-stats {
            grid-template-columns: 1fr;
            gap: 2rem;
        }
        
        .section-container,
        .footer-content {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }

        .hero-content {
            padding: 0 1.5rem;
        }
    }

    /* Animations */
    .fade-in {
        opacity: 0;
        transform: translateY(30px);
        transition: var(--transition-smooth);
    }

    .fade-in.visible {
        opacity: 1;
        transform: translateY(0);
    }

    /* Professional Elements */
    .professional-badge {
        background: var(--accent-light);
        color: var(--primary-color);
        padding: 0.5rem 1rem;
        border-radius: 50px;
        font-size: 0.8rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .status-indicator {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.9rem;
        font-weight: 500;
    }

    .status-indicator.success {
        color: var(--success-color);
    }

    .status-indicator.warning {
        color: var(--warning-color);
    }

    .status-indicator.danger {
        color: var(--danger-color);
    }
</style>
@endsection

@section('title_app')
    Loulidi Car - Premium Automotive Excellence
@endsection

@section('href_nav')
    href="{{ Route('home') }}"
@endsection

@section('name_nav')
    Fleet Catalog
@endsection
@section('href_nav')
    href="{{ Route('user.dashboard') }}"
@endsection

@section('name_nav')
    Dashboard
@endsection

@section('content')
<div class="main-container">
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content">
            <div class="hero-text">
                <p class="hero-subtitle">Premium Car Rental Morocco</p>
                <h1 class="hero-title">
                    Redefining <span class="highlight">Automotive</span><br>
                    Excellence
                </h1>
                <p class="hero-description">
                    Experience unparalleled luxury and performance with our meticulously curated 
                    fleet of premium vehicles. Every journey becomes an extraordinary experience 
                    combining sophistication, innovation, and exceptional service standards.
                </p>
                <div class="hero-buttons">
                    <a href="#fleet" class="btn-primary">Explore Our Fleet</a>
                    <a href="#services" class="btn-secondary">Learn More</a>
                </div>
            </div>
            
            <div class="hero-stats">
                <div class="stat-item">
                    <div class="stat-number">250+</div>
                    <div class="stat-label">Premium Vehicles</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">24/7</div>
                    <div class="stat-label">Concierge Service</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">99%</div>
                    <div class="stat-label">Client Satisfaction</div>
                </div>
            </div>
        </div>
        
        <div class="scroll-indicator">
            <i class="material-icons" style="font-size: 1.8rem;">keyboard_arrow_down</i>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services-section" id="services">
        <div class="section-container">
            <div class="section-header">
                <p class="section-subtitle">Our Services</p>
                <h2 class="section-title">Professional Excellence</h2>
                <p class="section-description">
                    We deliver comprehensive premium rental solutions designed to exceed expectations 
                    and transform every journey into a memorable experience through our commitment 
                    to quality, innovation, and personalized service.
                </p>
            </div>
            
            <div class="services-grid">
                <div class="service-item">
                    <div class="service-icon">
                        <i class="material-icons">star</i>
                    </div>
                    <h3 class="service-title">Premium Fleet Management</h3>
                    <p class="service-description">
                        Meticulously maintained luxury and performance vehicles from the world's 
                        most prestigious automotive brands, ensuring optimal performance and reliability.
                    </p>
                </div>
                
                <div class="service-item">
                    <div class="service-icon">
                        <i class="material-icons">support_agent</i>
                    </div>
                    <h3 class="service-title">24/7 Concierge Support</h3>
                    <p class="service-description">
                        Dedicated professional team available around the clock to provide 
                        personalized assistance and ensure seamless service throughout your rental experience.
                    </p>
                </div>
                
                <div class="service-item">
                    <div class="service-icon">
                        <i class="material-icons">local_shipping</i>
                    </div>
                    <h3 class="service-title">Executive Delivery Service</h3>
                    <p class="service-description">
                        White-glove delivery and collection service available at your preferred 
                        location across Morocco, ensuring convenience and professional presentation.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Fleet Section -->
    <section class="fleet-section" id="fleet">
        <div class="section-container">
            <div class="section-header">
                <p class="section-subtitle">Our Fleet</p>
                <h2 class="section-title">Exceptional Vehicles</h2>
                <p class="section-description">
                    Discover our carefully selected collection of premium vehicles, each offering 
                    a unique driving experience tailored to meet the highest standards of luxury, 
                    performance, and technological innovation.
                </p>
            </div>
            
            <div class="fleet-grid">
                <div class="fleet-item">
                    <div class="fleet-image" style="background-image: url('assets/img/Porsche-GT3-RS.jpg');"></div>
                    <div class="fleet-overlay">
                        <h3 class="fleet-name">Porsche 911 GT3 RS</h3>
                        <p class="fleet-price">From $350/day</p>
                        <div class="fleet-specs">
                            <span>520 HP</span>
                            <span>0-60 mph: 3.0s</span>
                            <span>PDK Transmission</span>
                        </div>
                    </div>
                </div>
                
                <div class="fleet-item">
                    <div class="fleet-image" style="background-image: url('assets/img/BMW-M4-Competition.jpg');"></div>
                    <div class="fleet-overlay">
                        <h3 class="fleet-name">BMW M4 Competition</h3>
                        <p class="fleet-price">From $280/day</p>
                        <div class="fleet-specs">
                            <span>510 HP</span>
                            <span>0-60 mph: 3.8s</span>
                            <span>M xDrive AWD</span>
                        </div>
                    </div>
                </div>
                
                <div class="fleet-item">
                    <div class="fleet-image" style="background-image: url('assets/img/Mercedes-AMG-GT.jpg');"></div>
                    <div class="fleet-overlay">
                        <h3 class="fleet-name">Mercedes-AMG GT</h3>
                        <p class="fleet-price">From $320/day</p>
                        <div class="fleet-specs">
                            <span>630 HP</span>
                            <span>0-60 mph: 3.1s</span>
                            <span>Biturbo V8</span>
                        </div>
                    </div>
                </div>
                
                <div class="fleet-item">
                    <div class="fleet-image" style="background-image: url('assets/img/Audi-r8.jpg');"></div>
                    <div class="fleet-overlay">
                        <h3 class="fleet-name">Audi R8 V10</h3>
                        <p class="fleet-price">From $400/day</p>
                        <div class="fleet-specs">
                            <span>610 HP</span>
                            <span>0-60 mph: 3.1s</span>
                            <span>Quattro AWD</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials-section">
        <div class="section-container">
            <div class="section-header">
                <p class="section-subtitle">Client Testimonials</p>
                <h2 class="section-title">What Our Clients Say</h2>
                <p class="section-description">
                    Discover the exceptional experiences shared by our valued clients who have 
                    trusted us to deliver unparalleled service and premium automotive excellence.
                </p>
            </div>
            
            <div class="testimonials-grid">
                <div class="testimonial-item">
                    <p class="testimonial-text">
                        Outstanding service and an incredible fleet. The Porsche 911 I rented 
                        exceeded all expectations. Professional, reliable, and truly premium experience 
                        from start to finish.
                    </p>
                    <div class="testimonial-author">James Richardson</div>
                    <div class="testimonial-role">CEO, Tech Innovations</div>
                </div>
                
                <div class="testimonial-item">
                    <p class="testimonial-text">
                        Exceptional attention to detail and remarkable customer service. The delivery 
                        was flawless and the vehicle was in pristine condition. Highly recommend 
                        for any premium rental needs.
                    </p>
                    <div class="testimonial-author">Sarah Mitchell</div>
                    <div class="testimonial-role">Executive Director</div>
                </div>
                
                <div class="testimonial-item">
                    <p class="testimonial-text">
                        Loulidi Car transformed our business trip into an unforgettable experience. 
                        The luxury SUV was perfect for our executive team, combining comfort 
                        with professional presentation.
                    </p>
                    <div class="testimonial-author">Michael Chen</div>
                    <div class="testimonial-role">Managing Partner</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="main-footer" id="contact">
        <div class="footer-content">
            <div class="footer-section">
                <h3>Loulidi Car</h3>
                <p>
                    Premium automotive rental service delivering exceptional luxury and performance 
                    vehicles with uncompromising professional standards and personalized attention 
                    to every detail of your experience.
                </p>
                <div class="social-links">
                    <a href="#" class="social-link">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="#" class="social-link">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-link">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="social-link">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </div>
            </div>
            
            <div class="footer-section">
                <h3>Premium Services</h3>
                <a href="#">Luxury Vehicle Rental</a>
                <a href="#">Sports Car Collection</a>
                <a href="#">Executive SUV Fleet</a>
                <a href="#">Chauffeur Services</a>
                <a href="#">Corporate Solutions</a>
            </div>
            
            <div class="footer-section">
                <h3>Client Support</h3>
                <a href="#">Customer Service</a>
                <a href="#">Booking Assistance</a>
                <a href="#">Insurance Information</a>
                <a href="#">Terms & Conditions</a>
                <a href="#">Privacy Policy</a>
            </div>
            
            <div class="footer-section">
                <h3>Contact Information</h3>
                <a href="tel:+212669692362">+212 6 69 69 23 62</a>
                <a href="mailto:contact@loulidicar.ma">contact@loulidicar.ma</a>
                <p>
                    MAG N°8 N°6 RUE 44 BLED SKALIA<br>
                    DOUAR RIAFA, FEZ, MOROCCO
                </p>
            </div>
        </div>
        
        <div class="footer-bottom">
            <div class="section-container">
                <p>&copy; 2024 Loulidi Car. All rights reserved. | Crafted with professional excellence</p>
            </div>
        </div>
    </footer>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Smooth scrolling for navigation links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // Intersection Observer for animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, observerOptions);
    
    // Observe elements for animation
    document.querySelectorAll('.fade-in, .service-item, .fleet-item, .testimonial-item').forEach(el => {
        el.classList.add('fade-in');
        observer.observe(el);
    });
    
    // Parallax effect for hero section
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        const heroSection = document.querySelector('.hero-section');
        if (heroSection && scrolled < window.innerHeight) {
            heroSection.style.transform = `translateY(${scrolled * 0.3}px)`;
        }
    });
    
    // Professional loading states
    const buttons = document.querySelectorAll('.btn-primary, .btn-secondary');
    buttons.forEach(button => {
        button.addEventListener('click', function(e) {
            if (this.getAttribute('href').startsWith('#')) {
                return; // Allow smooth scrolling for anchor links
            }
            
            // Add loading state for external links
            const originalText = this.textContent;
            this.textContent = 'Loading...';
            this.style.opacity = '0.7';
            
            setTimeout(() => {
                this.textContent = originalText;
                this.style.opacity = '1';
            }, 2000);
        });
    });
});
</script>
@endsection
