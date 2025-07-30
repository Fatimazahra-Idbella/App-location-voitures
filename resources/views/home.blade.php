@extends('layouts.app')

@section('head')
<style>
    /* Professional Corporate Color Variables */
    :root {
        /* Primary Colors */
        --primary-color: #0A1628;          /* Deep Navy Blue - Professional */
        --primary-hover: #1E40AF;          /* Professional Blue - Corporate */
        --secondary-color: #1E40AF;        /* Professional Blue */
        --accent-color: #F59E0B;           /* Premium Gold */
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
        
        /* Shadows */
        --shadow-sm: 0 1px 2px 0 rgba(15, 23, 42, 0.05);
        --shadow-md: 0 4px 6px -1px rgba(15, 23, 42, 0.1), 0 2px 4px -1px rgba(15, 23, 42, 0.06);
        --shadow-lg: 0 10px 15px -3px rgba(15, 23, 42, 0.1), 0 4px 6px -2px rgba(15, 23, 42, 0.05);
        --shadow-xl: 0 20px 25px -5px rgba(15, 23, 42, 0.1), 0 10px 10px -5px rgba(15, 23, 42, 0.04);
        
        /* Transitions */
        --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        --transition-smooth: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        
        /* Border Radius */
        --border-radius: 12px;
        --border-radius-sm: 8px;
        --border-radius-lg: 16px;
    }

    /* General Styles */
    body {
        background: linear-gradient(135deg, var(--background-secondary) 0%, var(--background-primary) 100%);
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        color: var(--text-primary);
    }

    /* Page Header */
    .page-header {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-hover) 100%);
        color: var(--text-white);
        padding: 5rem 0 4rem;
        margin-bottom: 3rem;
        position: relative;
        overflow: hidden;
    }

    .page-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="white" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="white" opacity="0.1"/><circle cx="50" cy="10" r="0.5" fill="white" opacity="0.1"/><circle cx="10" cy="60" r="0.5" fill="white" opacity="0.1"/><circle cx="90" cy="40" r="0.5" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
        opacity: 0.3;
    }

    .page-header .container {
        position: relative;
        z-index: 2;
    }

    .page-title {
        font-size: 3.5rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        letter-spacing: -1px;
    }

    .page-subtitle {
        font-size: 1.3rem;
        opacity: 0.9;
        font-weight: 400;
        max-width: 700px;
        margin: 0 auto;
        line-height: 1.6;
        color: #E2E8F0;
    }

    /* Filters Section */
    .filters-section {
        background: var(--background-primary);
        border-radius: var(--border-radius-lg);
        box-shadow: var(--shadow-lg);
        padding: 2.5rem;
        margin-bottom: 3rem;
        border: 1px solid var(--border-color);
        position: relative;
    }

    .filters-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
        border-radius: var(--border-radius-lg) var(--border-radius-lg) 0 0;
    }

    .filter-group {
        margin-bottom: 1.5rem;
    }

    .filter-label {
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 0.75rem;
        display: block;
        font-size: 0.95rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .filter-select, .filter-input {
        width: 100%;
        padding: 1rem 1.25rem;
        border: 2px solid var(--border-color);
        border-radius: var(--border-radius-sm);
        font-size: 0.95rem;
        transition: var(--transition);
        background: var(--background-primary);
        color: var(--text-primary);
        font-weight: 500;
    }

    .filter-select:focus, .filter-input:focus {
        outline: none;
        border-color: var(--accent-color);
        box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.1);
    }

    /* Vehicle Grid */
    .cars-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
        gap: 2.5rem;
        margin-bottom: 4rem;
    }

    /* Vehicle Cards */
    .car-card {
        background: var(--background-primary);
        border-radius: var(--border-radius-lg);
        box-shadow: var(--shadow-md);
        overflow: hidden;
        transition: var(--transition-smooth);
        border: 1px solid var(--border-color);
        position: relative;
        text-decoration: none;
        color: inherit;
        display: block;
    }

    .car-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-xl);
        text-decoration: none;
        color: inherit;
        border-color: var(--accent-color);
    }

    /* Vehicle Image */
    .car-image-container {
        position: relative;
        height: 260px;
        overflow: hidden;
        background: linear-gradient(135deg, var(--background-secondary) 0%, #E5E7EB 100%);
    }

    .car-image {
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        transition: var(--transition-smooth);
        position: relative;
    }

    .car-card:hover .car-image {
        transform: scale(1.05);
    }

    /* Availability Badge */
    .availability-badge {
        position: absolute;
        top: 1.25rem;
        right: 1.25rem;
        padding: 0.6rem 1.25rem;
        border-radius: 50px;
        font-size: 0.8rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        z-index: 3;
        box-shadow: var(--shadow-md);
    }

    .availability-badge.available {
        background: rgba(5, 150, 105, 0.95);
        color: var(--text-white);
        border-color: var(--success-color);
    }

    .availability-badge.unavailable {
        background: rgba(220, 38, 38, 0.95);
        color: var(--text-white);
        border-color: var(--danger-color);
    }

    /* Booking Overlay */
    .booking-overlay {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        opacity: 0;
        transition: var(--transition-smooth);
        z-index: 2;
    }

    .car-card:hover .booking-overlay {
        opacity: 1;
    }

    .booking-btn {
        background: rgba(255, 255, 255, 0.95);
        color: var(--primary-color);
        padding: 1.25rem 2.5rem;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.9rem;
        box-shadow: var(--shadow-lg);
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255, 255, 255, 0.3);
        transition: var(--transition);
        display: flex;
        align-items: center;
        gap: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .booking-btn:hover {
        background: var(--accent-color);
        color: var(--text-white);
        transform: scale(1.05);
        border-color: var(--accent-color);
    }

    /* Vehicle Details */
    .car-details {
        padding: 2rem;
    }

    .car-name {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 0.75rem;
        line-height: 1.3;
    }

    .car-year {
        color: var(--accent-color);
        font-weight: 600;
        font-size: 0.95rem;
        margin-bottom: 1.25rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* Specifications */
    .car-specs {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .spec-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-size: 0.9rem;
        color: var(--text-secondary);
        padding: 0.5rem;
        border-radius: var(--border-radius-sm);
        transition: var(--transition);
    }

    .spec-item:hover {
        background: var(--background-secondary);
        color: var(--text-primary);
    }

    .spec-icon {
        width: 18px;
        height: 18px;
        color: var(--accent-color);
    }

    .spec-value {
        font-weight: 600;
        color: var(--text-primary);
    }

    /* Price and Footer */
    .car-footer {
        border-top: 1px solid var(--border-color);
        padding: 1.5rem 2rem;
        background: var(--background-secondary);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .car-price {
        font-size: 1.4rem;
        font-weight: 700;
        color: var(--accent-color);
    }

    .price-period {
        font-size: 0.85rem;
        color: var(--text-secondary);
        font-weight: 500;
    }

    .car-status {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.85rem;
        color: var(--text-secondary);
        font-weight: 500;
    }

    /* Modern Footer */
    .modern-footer {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--background-dark) 100%);
        color: var(--text-white);
        margin-top: 5rem;
        position: relative;
        overflow: hidden;
    }

    .modern-footer::before {
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
        padding: 4rem 0 2rem;
    }

    .footer-section h6 {
        color: var(--text-white);
        font-weight: 600;
        font-size: 1.2rem;
        margin-bottom: 2rem;
        position: relative;
        padding-bottom: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .footer-section h6::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 50px;
        height: 3px;
        background: var(--accent-color);
        border-radius: 2px;
    }

    .footer-link {
        color: #CBD5E1;
        text-decoration: none;
        transition: var(--transition);
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 0.75rem;
        font-size: 0.95rem;
    }

    .footer-link:hover {
        color: var(--accent-color);
        text-decoration: none;
        transform: translateX(8px);
    }

    .footer-icon {
        color: var(--accent-color);
        width: 18px;
    }

    .social-links {
        display: flex;
        gap: 1rem;
        margin-top: 1.5rem;
    }

    .social-link {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: rgba(245, 158, 11, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--accent-color);
        transition: var(--transition-smooth);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(245, 158, 11, 0.2);
    }

    .social-link:hover {
        background: var(--accent-color);
        transform: translateY(-3px);
        color: var(--text-white);
        text-decoration: none;
        border-color: var(--accent-color);
        box-shadow: var(--shadow-lg);
    }

    .footer-map {
        border-radius: var(--border-radius-sm);
        overflow: hidden;
        box-shadow: var(--shadow-lg);
        border: 2px solid rgba(245, 158, 11, 0.2);
    }

    .footer-bottom {
        border-top: 1px solid rgba(245, 158, 11, 0.2);
        padding: 2rem 0;
        margin-top: 3rem;
        text-align: center;
        color: #94A3B8;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .page-title {
            font-size: 2.5rem;
        }
        
        .cars-grid {
            grid-template-columns: 1fr;
            gap: 2rem;
        }
        
        .filters-section {
            padding: 1.5rem;
        }
        
        .car-specs {
            grid-template-columns: 1fr;
        }
        
        .footer-content {
            padding: 3rem 0 1.5rem;
        }
    }

    /* Animations */
    .car-card {
        animation: fadeInUp 0.6s ease-out forwards;
        opacity: 0;
        transform: translateY(30px);
    }

    .car-card:nth-child(1) { animation-delay: 0.1s; }
    .car-card:nth-child(2) { animation-delay: 0.2s; }
    .car-card:nth-child(3) { animation-delay: 0.3s; }
    .car-card:nth-child(4) { animation-delay: 0.4s; }
    .car-card:nth-child(5) { animation-delay: 0.5s; }
    .car-card:nth-child(6) { animation-delay: 0.6s; }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Professional Enhancement */
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

    .premium-indicator {
        position: absolute;
        top: 1.25rem;
        left: 1.25rem;
        background: var(--accent-color);
        color: var(--text-white);
        padding: 0.5rem 1rem;
        border-radius: var(--border-radius-sm);
        font-size: 0.8rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        box-shadow: var(--shadow-md);
    }
</style>
@endsection

@section('title_app')
    Loulidi Car - Fleet Catalog
@endsection

@section('title_nav')
    <img style="margin-right: 6px" src="../assets/img/car-solid.svg" alt="Loulidi Car" width="20" height="20">
    Loulidi Car
@endsection

@section('href_nav')
    href="{{ Route('home') }}"
@endsection

@section('name_nav')
    Fleet Catalog
@endsection

@section('icon_nav')
    <i class="material-icons opacity-10">directions_car</i>
@endsection

@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="container text-center">
        <h1 class="page-title">Our Premium Fleet</h1>
        <p class="page-subtitle">
            Discover our carefully curated selection of modern and reliable vehicles, 
            perfect for all your transportation needs in Fez and surrounding areas.
        </p>
    </div>
</div>

<div class="container">
    <!-- Filters Section -->
    <div class="filters-section">
        <div class="row">
            <div class="col-md-3">
                <div class="filter-group">
                    <label class="filter-label">Brand</label>
                    <select class="filter-select">
                        <option value="">All Brands</option>
                        <option value="dacia">Dacia</option>
                        <option value="renault">Renault</option>
                        <option value="nissan">Nissan</option>
                        <option value="opel">Opel</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="filter-group">
                    <label class="filter-label">Daily Rate</label>
                    <select class="filter-select">
                        <option value="">All Prices</option>
                        <option value="0-300">$40 - $60</option>
                        <option value="300-500">$60 - $80</option>
                        <option value="500+">$80+</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="filter-group">
                    <label class="filter-label">Transmission</label>
                    <select class="filter-select">
                        <option value="">All Types</option>
                        <option value="manuel">Manual</option>
                        <option value="automatique">Automatic</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="filter-group">
                    <label class="filter-label">Availability</label>
                    <select class="filter-select">
                        <option value="">All Status</option>
                        <option value="available">Available</option>
                        <option value="unavailable">Reserved</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- Vehicle Grid -->
    <div class="cars-grid">
        <!-- Opel Crossland -->
        <a class="car-card" href="#">
            <div class="car-image-container">
                <div class="car-image" style="background-image: url('../assets/img/cars/OPEL-Crossland1.jpg');"></div>
                <div class="availability-badge available">Available</div>
                <div class="booking-overlay">
                    <div class="booking-btn">
                        <i class="material-icons" style="font-size: 1rem;">event_available</i>
                        Reserve Now
                    </div>
                </div>
            </div>
            <div class="car-details">
                <h4 class="car-name">Opel Crossland</h4>
                <div class="car-year">2022 Model</div>
                <div class="car-specs">
                    <div class="spec-item">
                        <i class="material-icons spec-icon">airline_seat_recline_normal</i>
                        <span><span class="spec-value">5</span> Passengers</span>
                    </div>
                    <div class="spec-item">
                        <i class="material-icons spec-icon">settings</i>
                        <span><span class="spec-value">Manual</span></span>
                    </div>
                    <div class="spec-item">
                        <i class="material-icons spec-icon">ac_unit</i>
                        <span><span class="spec-value">Air Conditioning</span></span>
                    </div>
                    <div class="spec-item">
                        <i class="material-icons spec-icon">luggage</i>
                        <span><span class="spec-value">Large</span> Trunk</span>
                    </div>
                </div>
            </div>
            <div class="car-footer">
                <div class="car-price">
                    $65 <span class="price-period">/ day</span>
                </div>
                <div class="car-status">
                    <i class="material-icons" style="font-size: 1rem; color: #059669;">check_circle</i>
                    Available
                </div>
            </div>
        </a>

        <!-- Nissan Micra -->
        <a class="car-card" href="#">
            <div class="car-image-container">
                <div class="car-image" style="background-image: url('../assets/img/cars/Nissan-Micra1.jpg');"></div>
                <div class="availability-badge available">Available</div>
                <div class="booking-overlay">
                    <div class="booking-btn">
                        <i class="material-icons" style="font-size: 1rem;">event_available</i>
                        Reserve Now
                    </div>
                </div>
            </div>
            <div class="car-details">
                <h4 class="car-name">Nissan Micra</h4>
                <div class="car-year">2022 Model</div>
                <div class="car-specs">
                    <div class="spec-item">
                        <i class="material-icons spec-icon">airline_seat_recline_normal</i>
                        <span><span class="spec-value">5</span> Passengers</span>
                    </div>
                    <div class="spec-item">
                        <i class="material-icons spec-icon">settings</i>
                        <span><span class="spec-value">Manual</span></span>
                    </div>
                    <div class="spec-item">
                        <i class="material-icons spec-icon">ac_unit</i>
                        <span><span class="spec-value">Air Conditioning</span></span>
                    </div>
                    <div class="spec-item">
                        <i class="material-icons spec-icon">local_gas_station</i>
                        <span><span class="spec-value">Fuel Efficient</span></span>
                    </div>
                </div>
            </div>
            <div class="car-footer">
                <div class="car-price">
                    $50 <span class="price-period">/ day</span>
                </div>
                <div class="car-status">
                    <i class="material-icons" style="font-size: 1rem; color: #059669;">check_circle</i>
                    Available
                </div>
            </div>
        </a>

        <!-- Dacia Logan -->
        <a class="car-card" href="#">
            <div class="car-image-container">
                <div class="car-image" style="background-image: url('../assets/img/cars/DACIA-Logan1.jpg');"></div>
                <div class="availability-badge unavailable">Reserved</div>
                <div class="booking-overlay">
                    <div class="booking-btn">
                        <i class="material-icons" style="font-size: 1rem;">schedule</i>
                        Join Waitlist
                    </div>
                </div>
            </div>
            <div class="car-details">
                <h4 class="car-name">Dacia Logan</h4>
                <div class="car-year">2022 Model</div>
                <div class="car-specs">
                    <div class="spec-item">
                        <i class="material-icons spec-icon">airline_seat_recline_normal</i>
                        <span><span class="spec-value">5</span> Passengers</span>
                    </div>
                    <div class="spec-item">
                        <i class="material-icons spec-icon">settings</i>
                        <span><span class="spec-value">Manual</span></span>
                    </div>
                    <div class="spec-item">
                        <i class="material-icons spec-icon">ac_unit</i>
                        <span><span class="spec-value">Air Conditioning</span></span>
                    </div>
                    <div class="spec-item">
                        <i class="material-icons spec-icon">family_restroom</i>
                        <span><span class="spec-value">Family Car</span></span>
                    </div>
                </div>
            </div>
            <div class="car-footer">
                <div class="car-price">
                    $55 <span class="price-period">/ day</span>
                </div>
                <div class="car-status">
                    <i class="material-icons" style="font-size: 1rem; color: #DC2626;">cancel</i>
                    Reserved
                </div>
            </div>
        </a>

        <!-- Dacia Stepway -->
        <a class="car-card" href="#">
            <div class="car-image-container">
                <div class="car-image" style="background-image: url('../assets/img/cars/DACIA-Sandero-Stepway1.jpg');"></div>
                <div class="availability-badge available">Available</div>
                <div class="premium-indicator">Popular</div>
                <div class="booking-overlay">
                    <div class="booking-btn">
                        <i class="material-icons" style="font-size: 1rem;">event_available</i>
                        Reserve Now
                    </div>
                </div>
            </div>
            <div class="car-details">
                <h4 class="car-name">Dacia Stepway</h4>
                <div class="car-year">2022 Model</div>
                <div class="car-specs">
                    <div class="spec-item">
                        <i class="material-icons spec-icon">airline_seat_recline_normal</i>
                        <span><span class="spec-value">5</span> Passengers</span>
                    </div>
                    <div class="spec-item">
                        <i class="material-icons spec-icon">settings</i>
                        <span><span class="spec-value">Manual</span></span>
                    </div>
                    <div class="spec-item">
                        <i class="material-icons spec-icon">ac_unit</i>
                        <span><span class="spec-value">Air Conditioning</span></span>
                    </div>
                    <div class="spec-item">
                        <i class="material-icons spec-icon">terrain</i>
                        <span><span class="spec-value">Compact</span> SUV</span>
                    </div>
                </div>
            </div>
            <div class="car-footer">
                <div class="car-price">
                    $60 <span class="price-period">/ day</span>
                </div>
                <div class="car-status">
                    <i class="material-icons" style="font-size: 1rem; color: #059669;">check_circle</i>
                    Available
                </div>
            </div>
        </a>

        <!-- Peugeot -->
        <a class="car-card" href="#">
  <div class="car-image-container">
    <div class="car-image" style="background-image: url('../assets/img/cars/peugeot-208-2019.jpg');"></div>
    <div class="availability-badge available">Available</div>
    <div class="booking-overlay">
      <div class="booking-btn">
        <i class="material-icons" style="font-size: 1rem;">event_available</i>
        Reserve Now
      </div>
    </div>
  </div>
  <div class="car-details">
    <h4 class="car-name">Peugeot</h4>
    <div class="car-year">2019 Model</div>
    <div class="car-specs">
      <div class="spec-item">
        <i class="material-icons spec-icon">airline_seat_recline_normal</i>
        <span><span class="spec-value">5</span> Passengers</span>
      </div>
      <div class="spec-item">
        <i class="material-icons spec-icon">settings</i>
        <span><span class="spec-value">1.2L PureTech</span> Manual</span>
      </div>
      <div class="spec-item">
        <i class="material-icons spec-icon">ac_unit</i>
        <span><span class="spec-value">Air Conditioning</span></span>
      </div>
      <div class="spec-item">
        <i class="material-icons spec-icon">local_gas_station</i>
        <span><span class="spec-value">Fuel Efficient</span> ~4.5 L/100km</span>
      </div>
    </div>
  </div>
  <div class="car-footer">
    <div class="car-price">
      $55 <span class="price-period">/ day</span>
    </div>
    <div class="car-status">
      <i class="material-icons" style="font-size: 1rem; color: #059669;">check_circle</i>
      Available
    </div>
  </div>
</a>

            

        <!-- Renault Clio -->
        <a class="car-card" href="#">
            <div class="car-image-container">
                <div class="car-image" style="background-image: url('../assets/img/cars/Renault-Clio1.jpg');"></div>
                <div class="availability-badge available">Available</div>
                <div class="premium-indicator">Premium</div>
                <div class="booking-overlay">
                    <div class="booking-btn">
                        <i class="material-icons" style="font-size: 1rem;">event_available</i>
                        Reserve Now
                    </div>
                </div>
            </div>
            <div class="car-details">
                <h4 class="car-name">Renault Clio 5</h4>
                <div class="car-year">2022 Model</div>
                <div class="car-specs">
                    <div class="spec-item">
                        <i class="material-icons spec-icon">airline_seat_recline_normal</i>
                        <span><span class="spec-value">5</span> Passengers</span>
                    </div>
                    <div class="spec-item">
                        <i class="material-icons spec-icon">settings</i>
                        <span><span class="spec-value">Manual</span></span>
                    </div>
                    <div class="spec-item">
                        <i class="material-icons spec-icon">ac_unit</i>
                        <span><span class="spec-value">Air Conditioning</span></span>
                    </div>
                    <div class="spec-item">
                        <i class="material-icons spec-icon">star</i>
                        <span><span class="spec-value">Premium</span></span>
                    </div>
                </div>
            </div>
            <div class="car-footer">
                <div class="car-price">
                    $70 <span class="price-period">/ day</span>
                </div>
                <div class="car-status">
                    <i class="material-icons" style="font-size: 1rem; color: #059669;">check_circle</i>
                    Available
                </div>
            </div>
        </a>
    </div>
</div>
@endsection

@section('footer2')
<footer class="modern-footer">
    <div class="footer-content">
        <div class="container">
            <div class="row">
                <!-- Location -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="footer-section">
                        <h6>Our Location</h6>
                        <div class="footer-map">
                            <iframe 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3305.400267526742!2d-4.952918175426015!3d34.05925217315427!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd9ff38688abf90b%3A0x2149be7ab2a386ee!2sLOULIDI%20CAR!5e0!3m2!1sar!2sma!4v1683487318973!5m2!1sar!2sma" 
                                width="100%" 
                                height="200" 
                                style="border:0;" 
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
                        <div class="footer-link">
                            <i class="material-icons footer-icon">schedule</i>
                            <span>Monday - Friday: 9:00 AM - 6:00 PM</span>
                        </div>
                        <div class="footer-link">
                            <i class="material-icons footer-icon">schedule</i>
                            <span>Saturday: 9:00 AM - 6:00 PM</span>
                        </div>
                        <div class="footer-link">
                            <i class="material-icons footer-icon">schedule</i>
                            <span>Sunday: Closed</span>
                        </div>
                        <div class="footer-link">
                            <i class="material-icons footer-icon">phone_in_talk</i>
                            <span>24/7 Emergency Service Available</span>
                        </div>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="col-lg-4 col-md-12 mb-4">
                    <div class="footer-section">
                        <h6>Contact Us</h6>
                        <div class="footer-link">
                            <i class="material-icons footer-icon">location_on</i>
                            <span>MAG N°8 N°6 RUE 44 BLED SKALIA<br>DOUAR RIAFA, FEZ, MOROCCO</span>
                        </div>
                        <div class="footer-link">
                            <i class="material-icons footer-icon">email</i>
                            <span>contact@loulidicar.ma</span>
                        </div>
                        <div class="footer-link">
                            <i class="material-icons footer-icon">phone</i>
                            <span>+212 6 69 69 23 62</span>
                        </div>
                        <div class="footer-link">
                            <i class="material-icons footer-icon">phone</i>
                            <span>+212 5 29 96 85 61</span>
                        </div>
                        
                        <div class="social-links">
                            <a href="#" class="social-link">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#" class="social-link">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="social-link">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                            <a href="#" class="social-link">
                                <i class="fab fa-facebook-f"></i>
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
                    <p class="mb-0">© 2025 Loulidi Car. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-0">Developed by <strong>Fatima Ezzahra IDBELLA</strong></p>
                </div>
            </div>
        </div>
    </div>
</footer>
@endsection
