@extends('layouts.body')

@section('Title')
    Professional Dashboard
@endsection

@section('dashboard_active')
    active bg-gradient-primary 
@endsection

@section('page_name')
    Dashboard
@endsection

@section('head')
<style>
    /* Professional Dashboard Variables - Yellow, Blue, Grey Palette */
    :root {
        /* Primary Colors */
        --primary-blue: #2563eb;
        --primary-blue-hover: #1d4ed8;
        --primary-blue-light: #3b82f6;
        --primary-blue-dark: #1e40af;
        
        --accent-yellow: #fbbf24;
        --accent-yellow-hover: #f59e0b;
        --accent-yellow-light: #fcd34d;
        --accent-yellow-dark: #d97706;
        
        --neutral-grey: #6b7280;
        --neutral-grey-light: #9ca3af;
        --neutral-grey-dark: #4b5563;
        --neutral-grey-darker: #374151;
        
        /* Background Colors */
        --bg-primary: #f8fafc;
        --bg-secondary: #f1f5f9;
        --bg-card: rgba(255, 255, 255, 0.95);
        --bg-glass: rgba(255, 255, 255, 0.85);
        --bg-overlay: rgba(37, 99, 235, 0.05);
        
        /* Text Colors */
        --text-primary: #1e293b;
        --text-secondary: #64748b;
        --text-muted: #94a3b8;
        --text-white: #ffffff;
        
        /* Status Colors */
        --success-color: #10b981;
        --warning-color: var(--accent-yellow);
        --danger-color: #ef4444;
        --info-color: var(--primary-blue);
        
        /* Shadows and Effects */
        --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        --shadow-blue: 0 10px 25px rgba(37, 99, 235, 0.15);
        --shadow-yellow: 0 10px 25px rgba(251, 191, 36, 0.15);
        
        /* Gradients */
        --gradient-blue: linear-gradient(135deg, var(--primary-blue), var(--primary-blue-light));
        --gradient-yellow: linear-gradient(135deg, var(--accent-yellow), var(--accent-yellow-light));
        --gradient-grey: linear-gradient(135deg, var(--neutral-grey), var(--neutral-grey-light));
        --gradient-overlay: linear-gradient(135deg, rgba(37, 99, 235, 0.1), rgba(251, 191, 36, 0.1));
        
        /* Transitions */
        --transition-fast: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        --transition-normal: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        --transition-slow: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        --transition-bounce: all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        
        /* Border Radius */
        --radius-sm: 8px;
        --radius-md: 12px;
        --radius-lg: 16px;
        --radius-xl: 20px;
    }

    /* Global Styles */
    body {
        background: var(--bg-primary);
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    }

    /* Enhanced Dashboard Cards */
    .dashboard-card {
        background: var(--bg-glass);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-lg);
        transition: var(--transition-normal);
        overflow: hidden;
        position: relative;
    }

    .dashboard-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: var(--gradient-blue);
        transform: scaleX(0);
        transform-origin: left;
        transition: var(--transition-normal);
    }

    .dashboard-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: var(--shadow-xl);
        border-color: rgba(37, 99, 235, 0.2);
    }

    .dashboard-card:hover::before {
        transform: scaleX(1);
    }

    /* Professional Stat Cards */
    .stat-card {
        position: relative;
        overflow: hidden;
    }

    .stat-card::after {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 100%;
        height: 200%;
        background: var(--gradient-overlay);
        opacity: 0;
        transform: rotate(45deg);
        transition: var(--transition-slow);
    }

    .stat-card:hover::after {
        opacity: 1;
        animation: shimmer-wave 1.5s ease-in-out;
    }

    @keyframes shimmer-wave {
        0% { transform: translateX(-100%) rotate(45deg); }
        100% { transform: translateX(100%) rotate(45deg); }
    }

    .stat-card .card-header {
        background: transparent;
        border: none;
        padding: 2rem;
        position: relative;
        z-index: 2;
    }

    .stat-icon {
        width: 80px;
        height: 80px;
        border-radius: var(--radius-md);
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
        box-shadow: var(--shadow-lg);
        transition: var(--transition-bounce);
    }

    .stat-icon.blue-gradient {
        background: var(--gradient-blue);
        box-shadow: var(--shadow-blue);
    }

    .stat-icon.yellow-gradient {
        background: var(--gradient-yellow);
        box-shadow: var(--shadow-yellow);
    }

    .stat-icon.grey-gradient {
        background: var(--gradient-grey);
        box-shadow: var(--shadow-lg);
    }

    .stat-icon::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.4), transparent);
        transform: rotate(45deg);
        transition: var(--transition-slow);
        opacity: 0;
    }

    .dashboard-card:hover .stat-icon {
        transform: scale(1.1) rotate(5deg);
    }

    .dashboard-card:hover .stat-icon::before {
        animation: icon-shimmer 1.2s ease-in-out;
        opacity: 1;
    }

    @keyframes icon-shimmer {
        0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
        100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
    }

    .stat-icon i {
        font-size: 2.5rem;
        color: var(--text-white);
        z-index: 2;
        position: relative;
        transition: var(--transition-normal);
    }

    .dashboard-card:hover .stat-icon i {
        transform: scale(1.1);
    }

    .stat-content {
        text-align: right;
        padding-top: 1rem;
    }

    .stat-label {
        font-size: 0.875rem;
        color: var(--text-secondary);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 0.75rem;
        transition: var(--transition-normal);
    }

    .dashboard-card:hover .stat-label {
        color: var(--primary-blue);
        transform: translateX(-5px);
    }

    .stat-value {
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--text-primary);
        margin-bottom: 0;
        line-height: 1.1;
        transition: var(--transition-normal);
    }

    .dashboard-card:hover .stat-value {
        color: var(--primary-blue);
        transform: scale(1.05);
    }

    .stat-footer {
        padding: 1.5rem 2rem;
        background: linear-gradient(135deg, rgba(248, 250, 252, 0.8), rgba(241, 245, 249, 0.6));
        border-top: 1px solid rgba(203, 213, 225, 0.3);
        margin: 0;
        position: relative;
        z-index: 2;
    }

    .stat-change {
        font-size: 0.875rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        transition: var(--transition-normal);
    }

    .stat-change.positive {
        color: var(--success-color);
    }

    .stat-change.negative {
        color: var(--danger-color);
    }

    .stat-change.warning {
        color: var(--warning-color);
    }

    .dashboard-card:hover .stat-change {
        transform: translateX(5px);
    }

    /* Dynamic Chart Cards */
    .chart-card {
        position: relative;
        overflow: hidden;
        background: var(--bg-glass);
    }

    .chart-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: var(--gradient-overlay);
        opacity: 0;
        transition: var(--transition-slow);
    }

    .chart-card:hover::before {
        opacity: 1;
    }

    .chart-card .card-header {
        background: transparent;
        border: none;
        padding: 0;
        margin: 1.5rem 1.5rem -1rem 1.5rem;
        z-index: 2;
        position: relative;
    }

    .chart-header {
        border-radius: var(--radius-md);
        padding: 2rem;
        position: relative;
        overflow: hidden;
        transition: var(--transition-normal);
    }

    .chart-header.blue-gradient {
        background: var(--gradient-blue);
        box-shadow: var(--shadow-blue);
    }

    .chart-header.yellow-gradient {
        background: var(--gradient-yellow);
        box-shadow: var(--shadow-yellow);
    }

    .chart-header.grey-gradient {
        background: var(--gradient-grey);
        box-shadow: var(--shadow-lg);
    }

    .chart-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.1));
        backdrop-filter: blur(10px);
        transition: var(--transition-normal);
    }

    .chart-card:hover .chart-header {
        transform: scale(1.02);
    }

    .chart-canvas {
        position: relative;
        z-index: 2;
        transition: var(--transition-normal);
    }

    .chart-card:hover .chart-canvas {
        transform: scale(1.01);
    }

    .chart-info {
        padding: 2rem;
        position: relative;
        z-index: 2;
    }

    .chart-title {
        font-size: 1.25rem;
        font-weight: 800;
        color: var(--text-primary);
        margin-bottom: 0.5rem;
        transition: var(--transition-normal);
    }

    .chart-card:hover .chart-title {
        color: var(--primary-blue);
        transform: translateX(5px);
    }

    .chart-subtitle {
        font-size: 0.875rem;
        color: var(--text-secondary);
        margin-bottom: 1.5rem;
        transition: var(--transition-normal);
    }

    .chart-card:hover .chart-subtitle {
        color: var(--text-primary);
    }

    .chart-meta {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        color: var(--text-muted);
        font-size: 0.875rem;
        font-weight: 500;
        transition: var(--transition-normal);
    }

    .chart-card:hover .chart-meta {
        color: var(--primary-blue);
        transform: translateX(5px);
    }

    /* Professional Table Styling */
    .professional-table {
        background: var(--bg-glass);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: var(--radius-lg);
        overflow: hidden;
        box-shadow: var(--shadow-lg);
        transition: var(--transition-normal);
    }

    .professional-table:hover {
        box-shadow: var(--shadow-xl);
        transform: translateY(-2px);
    }

    .professional-table .card-header {
        background: linear-gradient(135deg, rgba(37, 99, 235, 0.1), rgba(251, 191, 36, 0.1));
        border-bottom: 1px solid rgba(203, 213, 225, 0.3);
        padding: 2rem;
    }

    .table-title {
        font-size: 1.5rem;
        font-weight: 800;
        color: var(--text-primary);
        margin-bottom: 0.5rem;
        transition: var(--transition-normal);
    }

    .professional-table:hover .table-title {
        color: var(--primary-blue);
    }

    .table-subtitle {
        font-size: 0.875rem;
        color: var(--text-secondary);
        margin-bottom: 0;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-weight: 600;
    }

    .table-responsive {
        border-radius: 0 0 var(--radius-lg) var(--radius-lg);
        overflow: hidden;
    }

    .professional-table table {
        margin-bottom: 0;
    }

    .professional-table thead th {
        background: linear-gradient(135deg, rgba(248, 250, 252, 0.9), rgba(241, 245, 249, 0.7));
        border-bottom: 2px solid rgba(37, 99, 235, 0.1);
        padding: 1.5rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 0.75rem;
        color: var(--text-secondary);
        transition: var(--transition-normal);
    }

    .professional-table thead th:hover {
        color: var(--primary-blue);
        background: linear-gradient(135deg, rgba(37, 99, 235, 0.1), rgba(251, 191, 36, 0.1));
    }

    .professional-table tbody tr {
        transition: var(--transition-normal);
        border-bottom: 1px solid rgba(203, 213, 225, 0.2);
    }

    .professional-table tbody tr:hover {
        background: linear-gradient(135deg, rgba(37, 99, 235, 0.08), rgba(251, 191, 36, 0.08));
        transform: translateX(8px) scale(1.01);
        box-shadow: var(--shadow-md);
    }

    .professional-table tbody td {
        padding: 1.5rem;
        vertical-align: middle;
        border: none;
        transition: var(--transition-normal);
    }

    /* Vehicle Avatar Enhancement */
    .vehicle-avatar {
        width: 50px;
        height: 50px;
        border-radius: var(--radius-md);
        padding: 0.75rem;
        background: linear-gradient(135deg, var(--bg-secondary), var(--bg-primary));
        border: 2px solid rgba(37, 99, 235, 0.2);
        transition: var(--transition-bounce);
        box-shadow: var(--shadow-sm);
    }

    .professional-table tbody tr:hover .vehicle-avatar {
        transform: scale(1.15) rotate(5deg);
        border-color: var(--primary-blue);
        box-shadow: var(--shadow-blue);
    }

    /* Enhanced Progress Bar */
    .progress-wrapper {
        position: relative;
    }

    .progress {
        height: 10px;
        border-radius: 50px;
        background: rgba(107, 114, 128, 0.2);
        overflow: hidden;
        box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .progress-bar {
        border-radius: 50px;
        position: relative;
        overflow: hidden;
        transition: var(--transition-slow);
    }

    .progress-bar.blue-gradient {
        background: var(--gradient-blue);
    }

    .progress-bar.yellow-gradient {
        background: var(--gradient-yellow);
    }

    .progress-bar::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.6), transparent);
        animation: progress-shimmer 2.5s infinite;
    }

    @keyframes progress-shimmer {
        0% { left: -100%; }
        100% { left: 100%; }
    }

    /* Timeline Enhancement */
    .timeline-card {
        background: var(--bg-glass);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: var(--radius-lg);
        height: 100%;
        box-shadow: var(--shadow-lg);
        transition: var(--transition-normal);
    }

    .timeline-card:hover {
        box-shadow: var(--shadow-xl);
        transform: translateY(-2px);
    }

    .timeline-card .card-header {
        background: linear-gradient(135deg, rgba(37, 99, 235, 0.1), rgba(251, 191, 36, 0.1));
        border-bottom: 1px solid rgba(203, 213, 225, 0.3);
        padding: 2rem;
    }

    .timeline-title {
        font-size: 1.5rem;
        font-weight: 800;
        color: var(--text-primary);
        margin-bottom: 0.5rem;
        transition: var(--transition-normal);
    }

    .timeline-card:hover .timeline-title {
        color: var(--primary-blue);
    }

    .timeline-subtitle {
        font-size: 0.875rem;
        color: var(--text-secondary);
        margin-bottom: 0;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-weight: 600;
    }

    .timeline-one-side .timeline-block {
        position: relative;
        margin-bottom: 2rem;
        padding-left: 4rem;
        transition: var(--transition-normal);
    }

    .timeline-one-side .timeline-block:hover {
        transform: translateX(10px);
    }

    .timeline-step {
        position: absolute;
        left: 0;
        top: 0;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: var(--shadow-lg);
        transition: var(--transition-bounce);
        overflow: hidden;
    }

    .timeline-step.blue-gradient {
        background: var(--gradient-blue);
        box-shadow: var(--shadow-blue);
    }

    .timeline-step.yellow-gradient {
        background: var(--gradient-yellow);
        box-shadow: var(--shadow-yellow);
    }

    .timeline-step.grey-gradient {
        background: var(--gradient-grey);
    }

    .timeline-step:hover {
        transform: scale(1.2) rotate(10deg);
        box-shadow: var(--shadow-xl);
    }

    .timeline-step::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transform: rotate(45deg);
        transition: var(--transition-slow);
        opacity: 0;
    }

    .timeline-step:hover::before {
        animation: timeline-shimmer 1s ease-in-out;
        opacity: 1;
    }

    @keyframes timeline-shimmer {
        0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
        100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
    }

    .timeline-content h6 {
        font-weight: 800;
        color: var(--text-primary);
        margin-bottom: 0.5rem;
        font-size: 1rem;
        transition: var(--transition-normal);
    }

    .timeline-block:hover .timeline-content h6 {
        color: var(--primary-blue);
    }

    .timeline-content p {
        color: var(--text-muted);
        font-size: 0.875rem;
        margin-bottom: 0;
        font-weight: 500;
        transition: var(--transition-normal);
    }

    .timeline-block:hover .timeline-content p {
        color: var(--text-secondary);
    }

    /* Badge Enhancements */
    .badge {
        font-weight: 700;
        padding: 0.5rem 1rem;
        border-radius: var(--radius-sm);
        font-size: 0.75rem;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        transition: var(--transition-normal);
    }

    .badge.blue-gradient {
        background: var(--gradient-blue);
        color: var(--text-white);
        box-shadow: var(--shadow-blue);
    }

    .badge.yellow-gradient {
        background: var(--gradient-yellow);
        color: var(--text-white);
        box-shadow: var(--shadow-yellow);
    }

    .badge:hover {
        transform: scale(1.05);
    }

    /* Responsive Enhancements */
    @media (max-width: 768px) {
        .stat-value {
            font-size: 2rem;
        }
        
        .stat-icon {
            width: 70px;
            height: 70px;
        }
        
        .stat-icon i {
            font-size: 2rem;
        }
        
        .timeline-step {
            width: 40px;
            height: 40px;
        }
        
        .timeline-one-side .timeline-block {
            padding-left: 3rem;
        }
    }

    /* Animation Classes */
    .animate-fade-in {
        animation: fadeInUp 0.8s cubic-bezier(0.25, 0.8, 0.25, 1) forwards;
        opacity: 0;
    }

    .animate-delay-1 { animation-delay: 0.1s; }
    .animate-delay-2 { animation-delay: 0.2s; }
    .animate-delay-3 { animation-delay: 0.3s; }
    .animate-delay-4 { animation-delay: 0.4s; }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(40px) scale(0.95);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    /* Pulse Animation for Dynamic Elements */
    .pulse-animation {
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.7; }
    }

    /* Floating Animation */
    .float-animation {
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }
</style>
@endsection

@section('main_content')
<!-- Statistics Cards Row -->
<div class="row mb-4">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card dashboard-card stat-card animate-fade-in animate-delay-1 float-animation">
            <div class="card-header">
                <div class="stat-icon blue-gradient">
                    <i class="material-icons">account_balance_wallet</i>
                </div>
                <div class="stat-content">
                    <p class="stat-label">Today's Revenue</p>
                    <h4 class="stat-value">$53,420</h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="stat-footer">
                <p class="stat-change positive mb-0">
                    <i class="material-icons text-sm">trending_up</i>
                    <span class="font-weight-bolder">+55%</span> than last week
                </p>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card dashboard-card stat-card animate-fade-in animate-delay-2 float-animation">
            <div class="card-header">
                <div class="stat-icon yellow-gradient">
                    <i class="material-icons">people</i>
                </div>
                <div class="stat-content">
                    <p class="stat-label">Active Users</p>
                    <h4 class="stat-value">2,847</h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="stat-footer">
                <p class="stat-change positive mb-0">
                    <i class="material-icons text-sm">trending_up</i>
                    <span class="font-weight-bolder">+12%</span> than last month
                </p>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card dashboard-card stat-card animate-fade-in animate-delay-3 float-animation">
            <div class="card-header">
                <div class="stat-icon grey-gradient">
                    <i class="material-icons">person_add</i>
                </div>
                <div class="stat-content">
                    <p class="stat-label">New Clients</p>
                    <h4 class="stat-value">3,462</h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="stat-footer">
                <p class="stat-change warning mb-0">
                    <i class="material-icons text-sm">trending_down</i>
                    <span class="font-weight-bolder">-2%</span> than yesterday
                </p>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-sm-6">
        <div class="card dashboard-card stat-card animate-fade-in animate-delay-4 float-animation">
            <div class="card-header">
                <div class="stat-icon blue-gradient">
                    <i class="material-icons">shopping_cart</i>
                </div>
                <div class="stat-content">
                    <p class="stat-label">Total Sales</p>
                    <h4 class="stat-value">$103,43</h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="stat-footer">
                <p class="stat-change positive mb-0">
                    <i class="material-icons text-sm">trending_up</i>
                    <span class="font-weight-bolder">+5%</span> than yesterday
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Charts Row -->
<div class="row mt-4 mb-4">
    <div class="col-lg-4 col-md-6 mt-4 mb-4">
        <div class="card dashboard-card chart-card animate-fade-in animate-delay-1">
            <div class="card-header">
                <div class="chart-header blue-gradient">
                    <div class="chart">
                        <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                    </div>
                </div>
            </div>
            <div class="chart-info">
                <h6 class="chart-title">Vehicle Performance</h6>
                <p class="chart-subtitle">Monthly rental statistics and trends</p>
                <hr class="dark horizontal">
                <div class="chart-meta">
                    <i class="material-icons text-sm">schedule</i>
                    <span>Updated 2 hours ago</span>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4 col-md-6 mt-4 mb-4">
        <div class="card dashboard-card chart-card animate-fade-in animate-delay-2">
            <div class="card-header">
                <div class="chart-header yellow-gradient">
                    <div class="chart">
                        <canvas id="chart-line" class="chart-canvas" height="170"></canvas>
                    </div>
                </div>
            </div>
            <div class="chart-info">
                <h6 class="chart-title">Daily Revenue</h6>
                <p class="chart-subtitle">
                    <span class="text-success font-weight-bolder">+15%</span> increase in today's sales
                </p>
                <hr class="dark horizontal">
                <div class="chart-meta">
                    <i class="material-icons text-sm">schedule</i>
                    <span>Updated 4 minutes ago</span>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4 mt-4 mb-3">
        <div class="card dashboard-card chart-card animate-fade-in animate-delay-3">
            <div class="card-header">
                <div class="chart-header grey-gradient">
                    <div class="chart">
                        <canvas id="chart-line-tasks" class="chart-canvas" height="170"></canvas>
                    </div>
                </div>
            </div>
            <div class="chart-info">
                <h6 class="chart-title">Completed Bookings</h6>
                <p class="chart-subtitle">Monthly completion rate analysis</p>
                <hr class="dark horizontal">
                <div class="chart-meta">
                    <i class="material-icons text-sm">schedule</i>
                    <span>Just updated</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Data Tables Row -->
<div class="row mb-4">
    <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
        <div class="card professional-table animate-fade-in animate-delay-1">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-7">
                        <h6 class="table-title">Vehicle Fleet Management</h6>
                        <p class="table-subtitle">
                            <i class="material-icons text-success text-sm">check_circle</i>
                            <span class="font-weight-bold">30 active rentals</span> this month
                        </p>
                    </div>
                    <div class="col-lg-6 col-5 my-auto text-end">
                        <div class="dropdown">
                            <button class="btn btn-outline-primary btn-sm dropdown-toggle pulse-animation" type="button" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="material-icons text-sm">more_vert</i>
                                Actions
                            </button>
                            <ul class="dropdown-menu shadow-lg" aria-labelledby="dropdownTable">
                                <li><a class="dropdown-item" href="javascript:;"><i class="material-icons text-sm me-2">visibility</i>View All</a></li>
                                <li><a class="dropdown-item" href="javascript:;"><i class="material-icons text-sm me-2">download</i>Export Data</a></li>
                                <li><a class="dropdown-item" href="javascript:;"><i class="material-icons text-sm me-2">assessment</i>Generate Report</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Vehicle Details</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Rental Period</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Check-in Date</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Progress Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cars as $car)
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1 align-items-center">
                                        <div>
                                            <img src="../assets/img/small-logos/{{ $car->marque}}.svg" class="vehicle-avatar me-3" alt="{{ $car->marque}}">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm font-weight-bold">{{ $car->marque}} {{ $car->model}}</h6>
                                            <p class="text-xs text-secondary mb-0">Premium Class Vehicle</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <span class="badge blue-gradient">14 Days Active</span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <div class="d-flex flex-column">
                                        <span class="text-xs font-weight-bold">MON 27/02</span>
                                        <span class="text-xs text-secondary">7:20 PM</span>
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <div class="progress-wrapper w-75 mx-auto">
                                        <div class="progress-info">
                                            <div class="progress-percentage">
                                                <span class="text-xs font-weight-bold">75%</span>
                                            </div>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar blue-gradient w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4 col-md-6">
        <div class="card timeline-card animate-fade-in animate-delay-2">
            <div class="card-header">
                <h6 class="timeline-title">Recent Activity Feed</h6>
                <p class="timeline-subtitle">
                    <i class="material-icons text-success text-sm">trending_up</i>
                    <span class="font-weight-bold">24%</span> increase this month
                </p>
            </div>
            <div class="card-body p-3">
                <div class="timeline timeline-one-side">
                    <div class="timeline-block mb-3">
                        <span class="timeline-step blue-gradient">
                            <i class="material-icons text-white">notifications</i>
                        </span>
                        <div class="timeline-content">
                            <h6 class="text-dark text-sm font-weight-bold mb-0">$2,400 Payment Received</h6>
                            <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">22 DEC 7:20 PM</p>
                        </div>
                    </div>
                    <div class="timeline-block mb-3">
                        <span class="timeline-step yellow-gradient">
                            <i class="material-icons text-white">directions_car</i>
                        </span>
                        <div class="timeline-content">
                            <h6 class="text-dark text-sm font-weight-bold mb-0">New Rental Booking #1832412</h6>
                            <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 11:00 PM</p>
                        </div>
                    </div>
                    <div class="timeline-block mb-3">
                        <span class="timeline-step grey-gradient">
                            <i class="material-icons text-white">build</i>
                        </span>
                        <div class="timeline-content">
                            <h6 class="text-dark text-sm font-weight-bold mb-0">Vehicle Maintenance Completed</h6>
                            <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 9:34 PM</p>
                        </div>
                    </div>
                    <div class="timeline-block mb-3">
                        <span class="timeline-step blue-gradient">
                            <i class="material-icons text-white">credit_card</i>
                        </span>
                        <div class="timeline-content">
                            <h6 class="text-dark text-sm font-weight-bold mb-0">New Payment Method Added</h6>
                            <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">20 DEC 2:20 AM</p>
                        </div>
                    </div>
                    <div class="timeline-block mb-3">
                        <span class="timeline-step yellow-gradient">
                            <i class="material-icons text-white">vpn_key</i>
                        </span>
                        <div class="timeline-content">
                            <h6 class="text-dark text-sm font-weight-bold mb-0">Premium Features Unlocked</h6>
                            <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">18 DEC 4:54 AM</p>
                        </div>
                    </div>
                    <div class="timeline-block">
                        <span class="timeline-step grey-gradient">
                            <i class="material-icons text-white">receipt</i>
                        </span>
                        <div class="timeline-content">
                            <h6 class="text-dark text-sm font-weight-bold mb-0">New Booking Confirmed #9583120</h6>
                            <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">17 DEC</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script_charts')
<script>
// Enhanced Chart Configurations with Yellow, Blue, Grey Palette
var ctx = document.getElementById("chart-bars").getContext("2d");
new Chart(ctx, {
    type: "bar",
    data: {
        labels: ["Opel", "Micra", "Logan", "Step N", "Step B", "Clio"],
        datasets: [{
            label: "Rentals",
            tension: 0.4,
            borderWidth: 0,
            borderRadius: 12,
            borderSkipped: false,
            backgroundColor: "rgba(255, 255, 255, 0.95)",
            data: [45, 32, 28, 35, 42, 25],
            maxBarThickness: 40,
            hoverBackgroundColor: "rgba(251, 191, 36, 0.8)"
        }],
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: { display: false },
            tooltip: {
                backgroundColor: 'rgba(30, 41, 59, 0.95)',
                titleColor: '#ffffff',
                bodyColor: '#ffffff',
                borderColor: '#3b82f6',
                borderWidth: 1,
                cornerRadius: 8,
                displayColors: false
            }
        },
        interaction: {
            intersect: false,
            mode: 'index',
        },
        animation: {
            duration: 2000,
            easing: 'easeInOutQuart'
        },
        scales: {
            y: {
                grid: {
                    drawBorder: false,
                    display: true,
                    drawOnChartArea: true,
                    drawTicks: false,
                    borderDash: [5, 5],
                    color: 'rgba(255, 255, 255, 0.4)'
                },
                ticks: {
                    suggestedMin: 0,
                    suggestedMax: 50,
                    beginAtZero: true,
                    padding: 15,
                    font: {
                        size: 14,
                        weight: 600,
                        family: "Inter, sans-serif"
                    },
                    color: "#ffffff"
                },
            },
            x: {
                grid: {
                    drawBorder: false,
                    display: true,
                    drawOnChartArea: true,
                    drawTicks: false,
                    borderDash: [5, 5],
                    color: 'rgba(255, 255, 255, 0.4)'
                },
                ticks: {
                    display: true,
                    color: '#ffffff',
                    padding: 15,
                    font: {
                        size: 14,
                        weight: 600,
                        family: "Inter, sans-serif"
                    },
                }
            },
        },
    },
});

var ctx2 = document.getElementById("chart-line").getContext("2d");
new Chart(ctx2, {
    type: "line",
    data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            label: "Revenue",
            tension: 0.5,
            borderWidth: 0,
            pointRadius: 8,
            pointBackgroundColor: "rgba(255, 255, 255, 0.95)",
            pointBorderColor: "transparent",
            pointHoverRadius: 12,
            pointHoverBackgroundColor: "#ffffff",
            borderColor: "rgba(255, 255, 255, 0.95)",
            borderWidth: 5,
            backgroundColor: "transparent",
            fill: true,
            data: [50, 40, 300, 320, 500, 350, 200, 230, 500],
            maxBarThickness: 6
        }],
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: { display: false },
            tooltip: {
                backgroundColor: 'rgba(30, 41, 59, 0.95)',
                titleColor: '#ffffff',
                bodyColor: '#ffffff',
                borderColor: '#fbbf24',
                borderWidth: 1,
                cornerRadius: 8,
                displayColors: false
            }
        },
        interaction: {
            intersect: false,
            mode: 'index',
        },
        animation: {
            duration: 2500,
            easing: 'easeInOutCubic'
        },
        scales: {
            y: {
                grid: {
                    drawBorder: false,
                    display: true,
                    drawOnChartArea: true,
                    drawTicks: false,
                    borderDash: [5, 5],
                    color: 'rgba(255, 255, 255, 0.4)'
                },
                ticks: {
                    display: true,
                    color: '#ffffff',
                    padding: 15,
                    font: {
                        size: 14,
                        weight: 600,
                        family: "Inter, sans-serif"
                    },
                }
            },
            x: {
                grid: {
                    drawBorder: false,
                    display: false,
                    drawOnChartArea: false,
                    drawTicks: false,
                    borderDash: [5, 5]
                },
                ticks: {
                    display: true,
                    color: '#ffffff',
                    padding: 15,
                    font: {
                        size: 14,
                        weight: 600,
                        family: "Inter, sans-serif"
                    },
                }
            },
        },
    },
});

var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");
new Chart(ctx3, {
    type: "line",
    data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            label: "Bookings",
            tension: 0.5,
            borderWidth: 0,
            pointRadius: 8,
            pointBackgroundColor: "rgba(255, 255, 255, 0.95)",
            pointBorderColor: "transparent",
            pointHoverRadius: 12,
            pointHoverBackgroundColor: "#ffffff",
            borderColor: "rgba(255, 255, 255, 0.95)",
            borderWidth: 5,
            backgroundColor: "transparent",
            fill: true,
            data: [180, 150, 100, 180, 150, 100, 120, 180, 150, 40, 130, 50],
            maxBarThickness: 6
        }],
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: { display: false },
            tooltip: {
                backgroundColor: 'rgba(30, 41, 59, 0.95)',
                titleColor: '#ffffff',
                bodyColor: '#ffffff',
                borderColor: '#6b7280',
                borderWidth: 1,
                cornerRadius: 8,
                displayColors: false
            }
        },
        interaction: {
            intersect: false,
            mode: 'index',
        },
        animation: {
            duration: 2200,
            easing: 'easeInOutQuint'
        },
        scales: {
            y: {
                grid: {
                    drawBorder: false,
                    display: true,
                    drawOnChartArea: true,
                    drawTicks: false,
                    borderDash: [5, 5],
                    color: 'rgba(255, 255, 255, 0.4)'
                },
                ticks: {
                    display: true,
                    padding: 15,
                    color: '#ffffff',
                    font: {
                        size: 14,
                        weight: 600,
                        family: "Inter, sans-serif"
                    },
                }
            },
            x: {
                grid: {
                    drawBorder: false,
                    display: false,
                    drawOnChartArea: false,
                    drawTicks: false,
                    borderDash: [5, 5]
                },
                ticks: {
                    display: true,
                    color: '#ffffff',
                    padding: 15,
                    font: {
                        size: 14,
                        weight: 600,
                        family: "Inter, sans-serif"
                    },
                }
            },
        },
    },
});

// Enhanced Professional Animations and Interactions
document.addEventListener('DOMContentLoaded', function() {
    // Staggered animation for statistics cards
    const statCards = document.querySelectorAll('.stat-card');
    statCards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(50px) scale(0.9)';
        
        setTimeout(() => {
            card.style.transition = 'all 0.8s cubic-bezier(0.25, 0.8, 0.25, 1)';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0) scale(1)';
        }, index * 150);
    });
    
    // Enhanced table row interactions
    const tableRows = document.querySelectorAll('.professional-table tbody tr');
    tableRows.forEach((row, index) => {
        row.style.opacity = '0';
        row.style.transform = 'translateX(-30px)';
        
        setTimeout(() => {
            row.style.transition = 'all 0.6s cubic-bezier(0.25, 0.8, 0.25, 1)';
            row.style.opacity = '1';
            row.style.transform = 'translateX(0)';
        }, index * 100);
        
        row.addEventListener('mouseenter', function() {
            this.style.transform = 'translateX(10px) scale(1.01)';
            this.style.boxShadow = '0 10px 25px rgba(37, 99, 235, 0.15)';
        });
        
        row.addEventListener('mouseleave', function() {
            this.style.transform = 'translateX(0) scale(1)';
            this.style.boxShadow = 'none';
        });
    });
    
    // Timeline animations
    const timelineBlocks = document.querySelectorAll('.timeline-block');
    timelineBlocks.forEach((block, index) => {
        block.style.opacity = '0';
        block.style.transform = 'translateX(-40px)';
        
        setTimeout(() => {
            block.style.transition = 'all 0.7s cubic-bezier(0.25, 0.8, 0.25, 1)';
            block.style.opacity = '1';
            block.style.transform = 'translateX(0)';
        }, index * 200);
    });
    
    // Chart cards hover effects
    const chartCards = document.querySelectorAll('.chart-card');
    chartCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px) scale(1.02)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });
    
    // Progress bar animations
    const progressBars = document.querySelectorAll('.progress-bar');
    progressBars.forEach(bar => {
        const width = bar.style.width || bar.classList.toString().match(/w-(\d+)/)?.[1] + '%' || '0%';
        bar.style.width = '0%';
        
        setTimeout(() => {
            bar.style.transition = 'width 2s cubic-bezier(0.25, 0.8, 0.25, 1)';
            bar.style.width = width;
        }, 1000);
    });
    
    // Add dynamic counter animation for stat values
    const statValues = document.querySelectorAll('.stat-value');
    statValues.forEach(value => {
        const finalValue = value.textContent;
        const numericValue = parseInt(finalValue.replace(/[^0-9]/g, ''));
        let currentValue = 0;
        const increment = numericValue / 50;
        const prefix = finalValue.replace(/[0-9,]/g, '');
        
        value.textContent = prefix + '0';
        
        const counter = setInterval(() => {
            currentValue += increment;
            if (currentValue >= numericValue) {
                value.textContent = finalValue;
                clearInterval(counter);
            } else {
                value.textContent = prefix + Math.floor(currentValue).toLocaleString();
            }
        }, 40);
    });
});

// Add scroll-triggered animations
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, observerOptions);

// Observe all animated elements
document.querySelectorAll('.animate-fade-in').forEach(el => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(30px)';
    observer.observe(el);
});
</script>
@endsection
