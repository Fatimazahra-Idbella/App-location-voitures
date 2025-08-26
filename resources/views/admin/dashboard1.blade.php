@extends('layouts.body')

@section('Title')
    Admin Dashboard
@endsection

@section('dashboard_active')
    active bg-gradient-primary 
@endsection

@section('page_name')
    Dashboard
@endsection

@section('head')
<style>
    /* Professional Admin Dashboard - Dark Mode */
    :root {
        --primary-blue: #2563eb;
        --primary-blue-light: #3b82f6;
        --primary-blue-dark: #1d4ed8;
        --accent-yellow: #fbbf24;
        --accent-yellow-light: #fcd34d;
        --accent-yellow-dark: #f59e0b;
        --success-color: #10b981;
        --warning-color: #f59e0b;
        --danger-color: #ef4444;
        --info-color: #06b6d4;
        --purple-color: #8b5cf6;
        --pink-color: #ec4899;
        
        
       
        
        
       
        --border-color: #475569;
        --border-radius: 16px;
        --transition-smooth: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        --shadow-glow: 0 0 20px rgba(37, 99, 235, 0.3);
    }

    body {
        background: linear-gradient(135deg, var(--bg-secondary) 0%, var(--bg-primary) 100%);
        color: var(--text-primary);
        min-height: 100vh;
    }

    .admin-dashboard {
        padding: 2rem 0;
        min-height: 100vh;
    }

    /* Dashboard Header */
    .dashboard-header {
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-blue-dark) 100%);
        border-radius: var(--border-radius);
        padding: 2rem;
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
    }

    .dashboard-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="0.5"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
        opacity: 0.3;
    }

    .dashboard-title {
        font-size: 2rem;
        font-weight: 800;
        color: white;
        margin-bottom: 0.5rem;
        position: relative;
        z-index: 2;
    }

    .dashboard-subtitle {
        color: rgba(255, 255, 255, 0.8);
        font-size: 1.1rem;
        position: relative;
        z-index: 2;
    }

    /* Stats Cards */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .stat-card {
        background: var(--bg-card);
        border-radius: var(--border-radius);
        padding: 1.5rem;
        border: 1px solid var(--border-color);
        transition: var(--transition-smooth);
        position: relative;
        overflow: hidden;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-glow);
        border-color: var(--primary-blue);
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--primary-blue), var(--accent-yellow));
        transform: scaleX(0);
        transition: var(--transition-smooth);
    }

    .stat-card:hover::before {
        transform: scaleX(1);
    }

    .stat-icon {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1rem;
        font-size: 1.5rem;
        color: white;
    }

    .stat-value {
        font-size: 2rem;
        font-weight: 800;
        color: var(--text-primary);
        margin-bottom: 0.5rem;
    }

    .stat-label {
        color: var(--text-secondary);
        font-size: 0.9rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .stat-change {
        font-size: 0.8rem;
        font-weight: 600;
        margin-top: 0.5rem;
    }

    .stat-change.positive {
        color: var(--success-color);
    }

    .stat-change.negative {
        color: var(--danger-color);
    }

    /* Admin Modules Grid */
    .modules-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .module-card {
        background: var(--bg-card);
        border-radius: var(--border-radius);
        border: 1px solid var(--border-color);
        overflow: hidden;
        transition: var(--transition-smooth);
        position: relative;
        text-decoration: none;
        color: inherit;
    }

    .module-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-glow);
        border-color: var(--primary-blue);
        text-decoration: none;
        color: inherit;
    }

    .module-header {
        padding: 1.5rem;
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-blue-light) 100%);
        position: relative;
        overflow: hidden;
    }

    .module-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: var(--transition-smooth);
    }

    .module-card:hover .module-header::before {
        left: 100%;
    }

    .module-icon {
        width: 50px;
        height: 50px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1rem;
        backdrop-filter: blur(10px);
    }

    .module-icon i {
        font-size: 1.5rem;
        color: white;
    }

    .module-title {
        color: white;
        font-size: 1.25rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .module-description {
        color: rgba(255, 255, 255, 0.8);
        font-size: 0.9rem;
        line-height: 1.5;
    }

    .module-body {
        padding: 1.5rem;
    }

    .module-stats {
        display: flex;
        justify-content: space-between;
        margin-bottom: 1rem;
    }

    .module-stat {
        text-align: center;
    }

    .module-stat-value {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--text-primary);
    }

    .module-stat-label {
        font-size: 0.8rem;
        color: var(--text-secondary);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .module-actions {
        display: flex;
        gap: 0.5rem;
        margin-top: 1rem;
    }

    .module-btn {
        flex: 1;
        padding: 0.75rem;
        border: 1px solid var(--border-color);
        background: var(--bg-secondary);
        color: var(--text-secondary);
        border-radius: 8px;
        font-size: 0.8rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        transition: var(--transition-smooth);
        text-align: center;
        text-decoration: none;
    }

    .module-btn:hover {
        background: var(--primary-blue);
        border-color: var(--primary-blue);
        color: white;
        text-decoration: none;
    }

    .module-btn.primary {
        background: var(--primary-blue);
        border-color: var(--primary-blue);
        color: white;
    }

    .module-btn.primary:hover {
        background: var(--primary-blue-dark);
        border-color: var(--primary-blue-dark);
    }

    /* Recent Activity */
    .activity-card {
        background: var(--bg-card);
        border-radius: var(--border-radius);
        border: 1px solid var(--border-color);
        padding: 1.5rem;
    }

    .activity-header {
        display: flex;
        align-items: center;
        justify-content: between;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid var(--border-color);
    }

    .activity-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--text-primary);
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .activity-icon {
        width: 40px;
        height: 40px;
        background: var(--primary-blue);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
    }

    .activity-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem 0;
        border-bottom: 1px solid var(--border-color);
        transition: var(--transition-smooth);
    }

    .activity-item:last-child {
        border-bottom: none;
    }

    .activity-item:hover {
        background: rgba(37, 99, 235, 0.1);
        margin: 0 -1rem;
        padding: 1rem;
        border-radius: 8px;
    }

    .activity-item-icon {
        width: 35px;
        height: 35px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.9rem;
        color: white;
        flex-shrink: 0;
    }

    .activity-item-content {
        flex: 1;
    }

    .activity-item-title {
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 0.25rem;
    }

    .activity-item-description {
        font-size: 0.85rem;
        color: var(--text-secondary);
    }

    .activity-item-time {
        font-size: 0.8rem;
        color: var(--text-muted);
        flex-shrink: 0;
    }

    /* Animations */
    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    .animate-slide-up {
        animation: slideInUp 0.6s ease-out forwards;
    }

    .animate-fade-in {
        animation: fadeIn 0.8s ease-out forwards;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .dashboard-title {
            font-size: 2rem;
        }
        
        .stats-grid {
            grid-template-columns: 1fr;
        }
        
        .modules-grid {
            grid-template-columns: 1fr;
        }
        
        .module-stats {
            flex-direction: column;
            gap: 1rem;
        }
    }
</style>
@endsection

@section('main_content')
<div class="admin-dashboard">
    <div class="container-fluid">
        <!-- Dashboard Header -->
        <div class="dashboard-header animate-fade-in">
            <h4 class="dashboard-title">Admin Dashboard</h4>
            <p class="dashboard-subtitle">Comprehensive management system for your car rental business</p>
        </div>

        <!-- Statistics Overview -->
        <div class="stats-grid animate-slide-up">
            <div class="stat-card">
                <div class="stat-icon" style="background: var(--success-color);">
                    <i class="material-icons">directions_car</i>
                </div>
                <div class="stat-value">{{ $totalVehicles ?? '156' }}</div>
                <div class="stat-label">Total Vehicles</div>
                <div class="stat-change positive">
                    <i class="material-icons" style="font-size: 0.8rem;">trending_up</i>
                    +12% this month
                </div>
            </div>

            

            <div class="stat-card">
                <div class="stat-icon" style="background: var(--accent-yellow);">
                    <i class="material-icons">attach_money</i>
                </div>
                <div class="stat-value">${{ $totalRevenue ?? '53,420' }}</div>
                <div class="stat-label">Monthly Revenue</div>
                <div class="stat-change positive">
                    <i class="material-icons" style="font-size: 0.8rem;">trending_up</i>
                    +15% this month
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon" style="background: var(--warning-color);">
                    <i class="material-icons">assignment</i>
                </div>
                <div class="stat-value">{{ $activeContracts ?? '89' }}</div>
                <div class="stat-label">Active Contracts</div>
                <div class="stat-change negative">
                    <i class="material-icons" style="font-size: 0.8rem;">trending_down</i>
                    -3% this month
                </div>
            </div>
        </div>

        <!-- Admin Modules -->
        <div class="modules-grid animate-slide-up" style="animation-delay: 0.2s;">
            <!-- Vehicle Management -->
            <a href="{{ route('admin.vehicles') }}" class="module-card">
                <div class="module-header">
                    <div class="module-icon">
                        <i class="material-icons">directions_car</i>
                    </div>
                    <h3 class="module-title">Vehicle Management</h3>
                    <p class="module-description">Manage your entire fleet, track maintenance, and monitor vehicle status</p>
                </div>
                <div class="module-body">
                    <div class="module-stats">
                        <div class="module-stat">
                            <div class="module-stat-value">{{ $availableVehicles ?? '89' }}</div>
                            <div class="module-stat-label">Available</div>
                        </div>
                        <div class="module-stat">
                            <div class="module-stat-value">{{ $rentedVehicles ?? '45' }}</div>
                            <div class="module-stat-label">Rented</div>
                        </div>
                        <div class="module-stat">
                            <div class="module-stat-value">{{ $maintenanceVehicles ?? '12' }}</div>
                            <div class="module-stat-label">Maintenance</div>
                        </div>
                    </div>
                    <div class="module-actions">
                        <a href="{{ route('admin.vehicles') }}" class="module-btn primary">Manage Fleet</a>
                        <a href="{{ route('users.create') }}" class="module-btn">Add Vehicle</a>
                    </div>
                </div>
            </a>

            <!-- User Management -->
            <a href="{{ route('admin.manageusers') }}" class="module-card">
                <div class="module-header">
                    <div class="module-icon">
                        <i class="material-icons">people</i>
                    </div>
                    <h3 class="module-title">User Management</h3>
                    <p class="module-description">Manage user accounts, permissions, and customer relationships</p>
                </div>
                <div class="module-body">
                    <div class="module-stats">
                        <div class="module-stat">
                            <div class="module-stat-value">{{ $adminUsers ?? '8' }}</div>
                            <div class="module-stat-label">Admins</div>
                        </div>
                        <div class="module-stat">
                            <div class="module-stat-value">{{ $clientUsers ?? '2,839' }}</div>
                            <div class="module-stat-label">Clients</div>
                        </div>
                        <div class="module-stat">
                            <div class="module-stat-value">{{ $newUsers ?? '24' }}</div>
                            <div class="module-stat-label">New Today</div>
                        </div>
                    </div>
                    <div class="module-actions">
                        <a href="{{ route('admin.manageusers') }}" class="module-btn primary">Manage Users</a>
                        <a href="{{ route('users.create') }}" class="module-btn">Add User</a>
                    </div>
                </div>
            </a>

            <!-- Contract Management -->
            <a href="{{ route('admin.contracts') }}" class="module-card">
                <div class="module-header">
                    <div class="module-icon">
                        <i class="material-icons">assignment</i>
                    </div>
                    <h3 class="module-title">Contract Management</h3>
                    <p class="module-description">Handle rental contracts, agreements, and legal documentation</p>
                </div>
                <div class="module-body">
                    <div class="module-stats">
                        <div class="module-stat">
                            <div class="module-stat-value">{{ $activeContracts ?? '89' }}</div>
                            <div class="module-stat-label">Active</div>
                        </div>
                        <div class="module-stat">
                            <div class="module-stat-value">{{ $pendingContracts ?? '15' }}</div>
                            <div class="module-stat-label">Pending</div>
                        </div>
                        <div class="module-stat">
                            <div class="module-stat-value">{{ $expiredContracts ?? '3' }}</div>
                            <div class="module-stat-label">Expired</div>
                        </div>
                    </div>
                    <div class="module-actions">
                        <a href="{{ route('admin.contracts') }}" class="module-btn primary">View Contracts</a>
                        <a href="{{ route('admin.contracts') }}" class="module-btn">New Contract</a>
                    </div>
                </div>
            </a>

            <!-- Accounting -->
            <a href="{{ route('admin.accounting') }}" class="module-card">
                <div class="module-header">
                    <div class="module-icon">
                        <i class="material-icons">account_balance</i>
                    </div>
                    <h3 class="module-title">Accounting & Finance</h3>
                    <p class="module-description">Track revenue, expenses, and generate financial reports</p>
                </div>
                <div class="module-body">
                    <div class="module-stats">
                        <div class="module-stat">
                            <div class="module-stat-value">${{ $monthlyRevenue ?? '53.4K' }}</div>
                            <div class="module-stat-label">Revenue</div>
                        </div>
                        <div class="module-stat">
                            <div class="module-stat-value">${{ $monthlyExpenses ?? '18.2K' }}</div>
                            <div class="module-stat-label">Expenses</div>
                        </div>
                        <div class="module-stat">
                            <div class="module-stat-value">${{ $monthlyProfit ?? '35.2K' }}</div>
                            <div class="module-stat-label">Profit</div>
                        </div>
                    </div>
                    <div class="module-actions">
                        <a href="{{ route('admin.accounting') }}" class="module-btn primary">View Reports</a>
                        <a href="{{ route('admin.accounting') }}" class="module-btn">Export Data</a>
                    </div>
                </div>
            </a>

            <!-- Maintenance -->
            <a href="{{ route('admin.maintenance') }}" class="module-card">
                <div class="module-header">
                    <div class="module-icon">
                        <i class="material-icons">build</i>
                    </div>
                    <h3 class="module-title">Maintenance</h3>
                    <p class="module-description">Schedule and track vehicle maintenance, repairs, and inspections</p>
                </div>
                <div class="module-body">
                    <div class="module-stats">
                        <div class="module-stat">
                            <div class="module-stat-value">{{ $scheduledMaintenance ?? '12' }}</div>
                            <div class="module-stat-label">Scheduled</div>
                        </div>
                        <div class="module-stat">
                            <div class="module-stat-value">{{ $inProgressMaintenance ?? '5' }}</div>
                            <div class="module-stat-label">In Progress</div>
                        </div>
                        <div class="module-stat">
                            <div class="module-stat-value">{{ $overdueMaintenance ?? '2' }}</div>
                            <div class="module-stat-label">Overdue</div>
                        </div>
                    </div>
                    <div class="module-actions">
                        <a href="{{ route('admin.maintenance') }}" class="module-btn primary">View Schedule</a>
                        <a href="{{ route('admin.maintenance') }}" class="module-btn">Schedule</a>
                    </div>
                </div>
            </a>

            <!-- Notifications -->
            <a href="{{ route('admin.notifications') }}" class="module-card">
                <div class="module-header">
                    <div class="module-icon">
                        <i class="material-icons">notifications</i>
                    </div>
                    <h3 class="module-title">Notifications</h3>
                    <p class="module-description">Manage system notifications, alerts, and communication</p>
                </div>
                <div class="module-body">
                    <div class="module-stats">
                        <div class="module-stat">
                            <div class="module-stat-value">{{ $unreadNotifications ?? '23' }}</div>
                            <div class="module-stat-label">Unread</div>
                        </div>
                        <div class="module-stat">
                            <div class="module-stat-value">{{ $urgentNotifications ?? '3' }}</div>
                            <div class="module-stat-label">Urgent</div>
                        </div>
                        <div class="module-stat">
                            <div class="module-stat-value">{{ $todayNotifications ?? '8' }}</div>
                            <div class="module-stat-label">Today</div>
                        </div>
                    </div>
                    <div class="module-actions">
                        <a href="{{ route('admin.notifications') }}" class="module-btn primary">View All</a>
                        <a href="{{ route('admin.notifications') }}" class="module-btn">Send Alert</a>
                    </div>
                </div>
            </a>
        </div>

        <!-- Recent Activity -->
        <div class="row animate-slide-up" style="animation-delay: 0.4s;">
            <div class="col-12">
                <div class="activity-card">
                    <div class="activity-header">
                        <h3 class="activity-title">
                            <div class="activity-icon">
                                <i class="material-icons">history</i>
                            </div>
                            Recent Activity
                        </h3>
                    </div>
                    
                    <div class="activity-item">
                        <div class="activity-item-icon" style="background: var(--success-color);">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="activity-item-content">
                            <div class="activity-item-title">New user registered</div>
                            <div class="activity-item-description">John Doe created a new account</div>
                        </div>
                        <div class="activity-item-time">2 minutes ago</div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-item-icon" style="background: var(--info-color);">
                            <i class="material-icons">directions_car</i>
                        </div>
                        <div class="activity-item-content">
                            <div class="activity-item-title">Vehicle rented</div>
                            <div class="activity-item-description">BMW X5 (ABC-1234-56) rented to Sarah Johnson</div>
                        </div>
                        <div class="activity-item-time">15 minutes ago</div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-item-icon" style="background: var(--warning-color);">
                            <i class="material-icons">build</i>
                        </div>
                        <div class="activity-item-content">
                            <div class="activity-item-title">Maintenance scheduled</div>
                            <div class="activity-item-description">Mercedes C-Class scheduled for service</div>
                        </div>
                        <div class="activity-item-time">1 hour ago</div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-item-icon" style="background: var(--accent-yellow);">
                            <i class="material-icons">payment</i>
                        </div>
                        <div class="activity-item-content">
                            <div class="activity-item-title">Payment received</div>
                            <div class="activity-item-description">$1,250 payment processed for contract #CR-2024-001</div>
                        </div>
                        <div class="activity-item-time">2 hours ago</div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-item-icon" style="background: var(--danger-color);">
                            <i class="material-icons">warning</i>
                        </div>
                        <div class="activity-item-content">
                            <div class="activity-item-title">Insurance expiring</div>
                            <div class="activity-item-description">Audi A8 insurance expires in 7 days</div>
                        </div>
                        <div class="activity-item-time">3 hours ago</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add animation delays to cards
    const cards = document.querySelectorAll('.stat-card, .module-card');
    cards.forEach((card, index) => {
        card.style.animationDelay = `${index * 0.1}s`;
    });

    // Add hover effects
    const moduleCards = document.querySelectorAll('.module-card');
    moduleCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px) scale(1.02)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });

    // Update stats with animation
    const statValues = document.querySelectorAll('.stat-value');
    statValues.forEach(stat => {
        const finalValue = stat.textContent;
        stat.textContent = '0';
        
        setTimeout(() => {
            animateValue(stat, 0, parseInt(finalValue.replace(/[^0-9]/g, '')), 2000, finalValue);
        }, 500);
    });
});

function animateValue(element, start, end, duration, originalText) {
    const startTime = performance.now();
    const isMonetary = originalText.includes('$');
    const hasComma = originalText.includes(',');
    
    function update(currentTime) {
        const elapsed = currentTime - startTime;
        const progress = Math.min(elapsed / duration, 1);
        const current = Math.floor(start + (end - start) * progress);
        
        let displayValue = current.toString();
        if (hasComma && current >= 1000) {
            displayValue = current.toLocaleString();
        }
        if (isMonetary) {
            displayValue = '$' + displayValue;
        }
        
        element.textContent = displayValue;
        
        if (progress < 1) {
            requestAnimationFrame(update);
        } else {
            element.textContent = originalText;
        }
    }
    
    requestAnimationFrame(update);
}
</script>
@endsection
