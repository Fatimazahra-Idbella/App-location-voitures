@if(Auth::check() && Auth::user()->isAdmin)
    @php
        $lien = 'admin';
    @endphp
@else
    @php
        $lien = 'user';
    @endphp
@endif

@extends('layouts.app')

@section('head')
<style>
    /* Vehicle Dashboard Variables */
    :root {
        --luxury-color: #d4af37;
        --suv-color: #8b4513;
        --electric-color: #00c851;
        --diesel-color: #2e3440;
        --compact-color: #007bff;
        --sport-color: #dc3545;
        --family-color: #6f42c1;
        --premium-color: #fd7e14;
        
        --primary-color: #4361ee;
        --secondary-color: #2b2d42;
        --text-primary: #2b2d42;
        --text-secondary: #6c757d;
        --text-muted: #8d99ae;
        --border-color: #e9ecef;
        --card-shadow: 0 10px 20px rgba(0, 0, 0, 0.05), 0 6px 6px rgba(0, 0, 0, 0.07);
        --card-shadow-hover: 0 14px 28px rgba(0, 0, 0, 0.15), 0 10px 10px rgba(0, 0, 0, 0.12);
        --transition-normal: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        --transition-bounce: all 0.5s cubic-bezier(0.2, 0.8, 0.2, 1);
        --border-radius: 16px;
        --border-radius-sm: 8px;
    }

    /* Dashboard Container */
    .vehicle-dashboard {
        padding: 2rem 0;
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        min-height: 100vh;
    }

    .dashboard-header {
        text-align: center;
        margin-bottom: 3rem;
        padding: 2rem 0;
    }

    .dashboard-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 1rem;
        background: linear-gradient(135deg, var(--primary-color), #6366f1);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .dashboard-subtitle {
        font-size: 1.1rem;
        color: var(--text-secondary);
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
    }

    /* Vehicle Category Cards */
    .category-card-wrapper {
        margin-bottom: 2rem;
        height: 100%;
    }

    .category-card {
        position: relative;
        height: 100%;
        background: #ffffff;
        border-radius: var(--border-radius);
        overflow: hidden;
        box-shadow: var(--card-shadow);
        transition: var(--transition-normal);
        border: none;
        display: flex;
        flex-direction: column;
        cursor: pointer;
    }

    .category-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--card-shadow-hover);
    }

    /* Category Header */
    .category-header {
        position: relative;
        height: 220px;
        overflow: hidden;
        border-radius: var(--border-radius) var(--border-radius) 0 0;
    }

    .category-image {
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        transition: var(--transition-bounce);
        transform-origin: center;
    }

    .category-card:hover .category-image {
        transform: scale(1.1);
    }

    /* Category Overlay */
    .category-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.6));
        transition: var(--transition-normal);
    }

    .category-card:hover .category-overlay {
        background: linear-gradient(135deg, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.7));
    }

    /* Category Badge */
    .category-badge {
        position: absolute;
        top: 1.5rem;
        left: 1.5rem;
        padding: 0.5rem 1rem;
        border-radius: 50px;
        font-size: 0.8rem;
        font-weight: 600;
        color: white;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: var(--transition-normal);
    }

    /* Category Stats */
    .category-stats {
        position: absolute;
        top: 1.5rem;
        right: 1.5rem;
        background: rgba(255, 255, 255, 0.9);
        color: var(--text-primary);
        padding: 0.5rem 1rem;
        border-radius: var(--border-radius-sm);
        font-size: 0.85rem;
        font-weight: 600;
        backdrop-filter: blur(10px);
        transition: var(--transition-normal);
    }

    /* Category Action */
    .category-action {
        position: absolute;
        bottom: 1.5rem;
        left: 50%;
        transform: translateX(-50%) translateY(20px);
        background: white;
        color: var(--text-primary);
        padding: 0.75rem 2rem;
        border-radius: 50px;
        font-weight: 600;
        opacity: 0;
        transition: var(--transition-bounce);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-size: 0.85rem;
    }

    .category-card:hover .category-action {
        opacity: 1;
        transform: translateX(-50%) translateY(0);
    }

    /* Category Body */
    .category-body {
        padding: 1.5rem;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .category-title {
        font-size: 1.4rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 0.5rem;
    }

    .category-description {
        color: var(--text-secondary);
        font-size: 0.95rem;
        margin-bottom: 1.5rem;
        flex-grow: 1;
        line-height: 1.6;
    }

    /* Category Features */
    .category-features {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin-bottom: 1rem;
    }

    .feature-tag {
        background: var(--border-color);
        color: var(--text-secondary);
        padding: 0.25rem 0.75rem;
        border-radius: 50px;
        font-size: 0.8rem;
        font-weight: 500;
    }

    /* Category Footer */
    .category-footer {
        padding: 1rem 1.5rem;
        border-top: 1px solid var(--border-color);
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #f8f9fa;
    }

    .price-range {
        font-weight: 700;
        color: var(--text-primary);
        font-size: 1rem;
    }

    .availability {
        display: flex;
        align-items: center;
        color: var(--text-muted);
        font-size: 0.85rem;
    }

    .availability i {
        margin-right: 0.5rem;
        font-size: 1rem;
    }

    /* Category Specific Colors */
    .luxury-category .category-badge {
        background: var(--luxury-color);
    }

    .suv-category .category-badge {
        background: var(--suv-color);
    }

    .electric-category .category-badge {
        background: var(--electric-color);
    }

    .diesel-category .category-badge {
        background: var(--diesel-color);
    }

    .compact-category .category-badge {
        background: var(--compact-color);
    }

    .sport-category .category-badge {
        background: var(--sport-color);
    }

    .family-category .category-badge {
        background: var(--family-color);
    }

    .premium-category .category-badge {
        background: var(--premium-color);
    }

    /* Animations */
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

    .animate-fade-in {
        animation: fadeInUp 0.6s ease-out forwards;
        opacity: 0;
    }

    .animate-delay-1 { animation-delay: 0.1s; }
    .animate-delay-2 { animation-delay: 0.2s; }
    .animate-delay-3 { animation-delay: 0.3s; }
    .animate-delay-4 { animation-delay: 0.4s; }
    .animate-delay-5 { animation-delay: 0.5s; }
    .animate-delay-6 { animation-delay: 0.6s; }
    .animate-delay-7 { animation-delay: 0.7s; }
    .animate-delay-8 { animation-delay: 0.8s; }

    /* Responsive Design */
    @media (max-width: 992px) {
        .category-header {
            height: 180px;
        }
        
        .dashboard-title {
            font-size: 2rem;
        }
    }

    @media (max-width: 768px) {
        .vehicle-dashboard {
            padding: 1rem 0;
        }
        
        .dashboard-header {
            margin-bottom: 2rem;
            padding: 1rem 0;
        }
        
        .dashboard-title {
            font-size: 1.75rem;
        }
        
        .category-header {
            height: 160px;
        }
        
        .category-features {
            justify-content: center;
        }
    }
</style>
@endsection

@section('href_nav')
    href="{{ Route('welcome') }}"
@endsection

@section('name_nav')
    Vehicle Categories
@endsection

@section('icon_nav')
    <i class="material-icons opacity-10">directions_car</i>
@endsection

@section('content')
<div class="vehicle-dashboard">
    <div class="container-fluid">
        <div class="dashboard-header">
            <h1 class="dashboard-title">Choose Your Vehicle Category</h1>
            <p class="dashboard-subtitle">
                Explore our diverse fleet of vehicles across different categories. 
                From luxury cars to eco-friendly electric vehicles, find the perfect match for your needs.
            </p>
        </div>
        
        <div class="row g-4">
            <!-- Luxury Vehicles -->
            <div class="col-lg-3 col-md-6">
                <div class="category-card-wrapper animate-fade-in animate-delay-1">
                    <a href="{{ route('vehicles.category', 'luxury') }}" class="text-decoration-none">
                        <div class="category-card luxury-category">
                            <div class="category-header">
                                <div class="category-image" style="background-image: url('https://images.unsplash.com/photo-1544636331-e26879cd4d9b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80');"></div>
                                <div class="category-overlay"></div>
                                <div class="category-badge">Luxury</div>
                                <div class="category-stats">12 Models</div>
                                <div class="category-action">Explore Luxury</div>
                            </div>
                            <div class="category-body">
                                <h3 class="category-title">Luxury Vehicles</h3>
                                <p class="category-description">
                                    Experience ultimate comfort and prestige with our premium luxury vehicle collection.
                                </p>
                                <div class="category-features">
                                    <span class="feature-tag">Premium Interior</span>
                                    <span class="feature-tag">Advanced Tech</span>
                                    <span class="feature-tag">Chauffeur Available</span>
                                </div>
                            </div>
                            <div class="category-footer">
                                <div class="price-range">$150-500/day</div>
                                <div class="availability">
                                    <i class="material-icons text-success">check_circle</i>
                                    Available
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- SUV & 4x4 Vehicles -->
            <div class="col-lg-3 col-md-6">
                <div class="category-card-wrapper animate-fade-in animate-delay-2">
                    <a href="{{ route('vehicles.category', 'suv') }}" class="text-decoration-none">
                        <div class="category-card suv-category">
                            <div class="category-header">
                                <div class="category-image" style="background-image: url('https://images.unsplash.com/photo-1519641471654-76ce0107ad1b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80');"></div>
                                <div class="category-overlay"></div>
                                <div class="category-badge">SUV & 4x4</div>
                                <div class="category-stats">18 Models</div>
                                <div class="category-action">Explore SUVs</div>
                            </div>
                            <div class="category-body">
                                <h3 class="category-title">SUV & 4x4 Vehicles</h3>
                                <p class="category-description">
                                    Perfect for adventures and family trips with spacious interiors and off-road capabilities.
                                </p>
                                <div class="category-features">
                                    <span class="feature-tag">All-Terrain</span>
                                    <span class="feature-tag">7+ Seats</span>
                                    <span class="feature-tag">Large Cargo</span>
                                </div>
                            </div>
                            <div class="category-footer">
                                <div class="price-range">$80-200/day</div>
                                <div class="availability">
                                    <i class="material-icons text-success">check_circle</i>
                                    Available
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Electric Vehicles -->
            <div class="col-lg-3 col-md-6">
                <div class="category-card-wrapper animate-fade-in animate-delay-3">
                    <a href="{{ route('vehicles.category', 'electric') }}" class="text-decoration-none">
                        <div class="category-card electric-category">
                            <div class="category-header">
                                <div class="category-image" style="background-image: url('https://images.unsplash.com/photo-1593941707882-a5bac6861d75?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80');"></div>
                                <div class="category-overlay"></div>
                                <div class="category-badge">Electric</div>
                                <div class="category-stats">8 Models</div>
                                <div class="category-action">Go Electric</div>
                            </div>
                            <div class="category-body">
                                <h3 class="category-title">Electric Vehicles</h3>
                                <p class="category-description">
                                    Eco-friendly and innovative electric vehicles for a sustainable future.
                                </p>
                                <div class="category-features">
                                    <span class="feature-tag">Zero Emissions</span>
                                    <span class="feature-tag">Fast Charging</span>
                                    <span class="feature-tag">Silent Drive</span>
                                </div>
                            </div>
                            <div class="category-footer">
                                <div class="price-range">$60-180/day</div>
                                <div class="availability">
                                    <i class="material-icons text-success">check_circle</i>
                                    Available
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Diesel Vehicles -->
            <div class="col-lg-3 col-md-6">
                <div class="category-card-wrapper animate-fade-in animate-delay-4">
                    <a href="{{ route('vehicles.category', 'diesel') }}" class="text-decoration-none">
                        <div class="category-card diesel-category">
                            <div class="category-header">
                                <div class="category-image" style="background-image: url('https://images.unsplash.com/photo-1552519507-da3b142c6e3d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80');"></div>
                                <div class="category-overlay"></div>
                                <div class="category-badge">Diesel</div>
                                <div class="category-stats">15 Models</div>
                                <div class="category-action">Explore Diesel</div>
                            </div>
                            <div class="category-body">
                                <h3 class="category-title">Diesel Vehicles</h3>
                                <p class="category-description">
                                    Fuel-efficient diesel vehicles perfect for long-distance travel and heavy-duty use.
                                </p>
                                <div class="category-features">
                                    <span class="feature-tag">Fuel Efficient</span>
                                    <span class="feature-tag">Long Range</span>
                                    <span class="feature-tag">Powerful Engine</span>
                                </div>
                            </div>
                            <div class="category-footer">
                                <div class="price-range">$50-120/day</div>
                                <div class="availability">
                                    <i class="material-icons text-success">check_circle</i>
                                    Available
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Compact Vehicles -->
            <div class="col-lg-3 col-md-6">
                <div class="category-card-wrapper animate-fade-in animate-delay-5">
                    <a href="{{ route('vehicles.category', 'compact') }}" class="text-decoration-none">
                        <div class="category-card compact-category">
                            <div class="category-header">
                                <div class="category-image" style="background-image: url('https://images.unsplash.com/photo-1503376780353-7e6692767b70?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80');"></div>
                                <div class="category-overlay"></div>
                                <div class="category-badge">Compact</div>
                                <div class="category-stats">20 Models</div>
                                <div class="category-action">Choose Compact</div>
                            </div>
                            <div class="category-body">
                                <h3 class="category-title">Compact Vehicles</h3>
                                <p class="category-description">
                                    Perfect for city driving with excellent fuel economy and easy parking.
                                </p>
                                <div class="category-features">
                                    <span class="feature-tag">City Friendly</span>
                                    <span class="feature-tag">Economic</span>
                                    <span class="feature-tag">Easy Parking</span>
                                </div>
                            </div>
                            <div class="category-footer">
                                <div class="price-range">$30-80/day</div>
                                <div class="availability">
                                    <i class="material-icons text-success">check_circle</i>
                                    Available
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Sport Vehicles -->
            <div class="col-lg-3 col-md-6">
                <div class="category-card-wrapper animate-fade-in animate-delay-6">
                    <a href="{{ route('vehicles.category', 'sport') }}" class="text-decoration-none">
                        <div class="category-card sport-category">
                            <div class="category-header">
                                <div class="category-image" style="background-image: url('https://images.unsplash.com/photo-1555215695-3004980ad54e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80');"></div>
                                <div class="category-overlay"></div>
                                <div class="category-badge">Sport</div>
                                <div class="category-stats">6 Models</div>
                                <div class="category-action">Feel The Speed</div>
                            </div>
                            <div class="category-body">
                                <h3 class="category-title">Sport Vehicles</h3>
                                <p class="category-description">
                                    High-performance sports cars for an exhilarating driving experience.
                                </p>
                                <div class="category-features">
                                    <span class="feature-tag">High Performance</span>
                                    <span class="feature-tag">Racing Style</span>
                                    <span class="feature-tag">Premium Sound</span>
                                </div>
                            </div>
                            <div class="category-footer">
                                <div class="price-range">$200-600/day</div>
                                <div class="availability">
                                    <i class="material-icons text-warning">schedule</i>
                                    Limited
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Family Vehicles -->
            <div class="col-lg-3 col-md-6">
                <div class="category-card-wrapper animate-fade-in animate-delay-7">
                    <a href="{{ route('vehicles.category', 'family') }}" class="text-decoration-none">
                        <div class="category-card family-category">
                            <div class="category-header">
                                <div class="category-image" style="background-image: url('https://images.unsplash.com/photo-1449824913935-59a10b8d2000?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80');"></div>
                                <div class="category-overlay"></div>
                                <div class="category-badge">Family</div>
                                <div class="category-stats">14 Models</div>
                                <div class="category-action">Family Choice</div>
                            </div>
                            <div class="category-body">
                                <h3 class="category-title">Family Vehicles</h3>
                                <p class="category-description">
                                    Spacious and safe vehicles designed for comfortable family travel.
                                </p>
                                <div class="category-features">
                                    <span class="feature-tag">Safety First</span>
                                    <span class="feature-tag">Spacious</span>
                                    <span class="feature-tag">Child Seats</span>
                                </div>
                            </div>
                            <div class="category-footer">
                                <div class="price-range">$60-150/day</div>
                                <div class="availability">
                                    <i class="material-icons text-success">check_circle</i>
                                    Available
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Premium Vehicles -->
            <div class="col-lg-3 col-md-6">
                <div class="category-card-wrapper animate-fade-in animate-delay-8">
                    <a href="{{ route('vehicles.category', 'premium') }}" class="text-decoration-none">
                        <div class="category-card premium-category">
                            <div class="category-header">
                                <div class="category-image" style="background-image: url('https://images.unsplash.com/photo-1502877338535-766e1452684a?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80');"></div>
                                <div class="category-overlay"></div>
                                <div class="category-badge">Premium</div>
                                <div class="category-stats">10 Models</div>
                                <div class="category-action">Go Premium</div>
                            </div>
                            <div class="category-body">
                                <h3 class="category-title">Premium Vehicles</h3>
                                <p class="category-description">
                                    High-end vehicles with premium features and exceptional comfort.
                                </p>
                                <div class="category-features">
                                    <span class="feature-tag">Premium Features</span>
                                    <span class="feature-tag">Leather Interior</span>
                                    <span class="feature-tag">Advanced Safety</span>
                                </div>
                            </div>
                            <div class="category-footer">
                                <div class="price-range">$120-300/day</div>
                                <div class="availability">
                                    <i class="material-icons text-success">check_circle</i>
                                    Available
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
