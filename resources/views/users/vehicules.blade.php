@extends('layouts.body')

@section('Title')
    Vehicles Management
@endsection

@section('vehicules_active')
    active bg-gradient-primary 
@endsection

@section('page_name')
    Vehicles
@endsection

@section('head')
<style>
    /* Professional Yellow, Blue, Grey Color Palette - Clean Light Mode */
    :root {
        --primary-blue: #2563eb;
        --primary-blue-light: #3b82f6;
        --primary-blue-dark: #1d4ed8;
        --accent-yellow: #fbbf24;
        --accent-yellow-light: #fcd34d;
        --accent-yellow-dark: #f59e0b;
        --neutral-grey: #6b7280;
        --neutral-grey-light: #9ca3af;
        --neutral-grey-dark: #4b5563;
        --text-primary: #1f2937;
        --text-secondary: #6b7280;
        --success-color: #10b981;
        --warning-color: #f59e0b;
        --danger-color: #ef4444;
        --border-color: #e5e7eb;
        --shadow-light: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        --shadow-medium: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        --shadow-heavy: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        --border-radius: 12px;
        --border-radius-lg: 16px;
        --transition-smooth: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        --transition-bounce: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    /* Clean Container - No Background */
    .vehicles-container {
        padding: 2rem 0;
        position: relative;
    }

    /* Enhanced Card Styling - Clean White */
    .professional-card {
        
        border-radius: var(--border-radius-lg);
        box-shadow: var(--shadow-medium);
        
        overflow: hidden;
        transition: var(--transition-smooth);
        position: relative;
    }

   
    .professional-card:hover {
        transform: translateY(-6px);
        box-shadow: var(--shadow-heavy);
        border-color: rgba(37, 99, 235, 0.2);
    }

    .professional-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        
        opacity: 0;
        transition: var(--transition-smooth);
    }

    .professional-card:hover::before {
        opacity: 1;
    }

    /* Card Header Enhancement */
    .card-header-professional {
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-blue-light) 100%);
        border: none;
        padding: 1.5rem 2rem;
        position: relative;
        overflow: hidden;
    }

    .card-header-professional::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: var(--transition-smooth);
    }

    .card-header-professional:hover::before {
        left: 100%;
    }

    .card-title-professional {
        color: white;
        font-size: 1.25rem;
        font-weight: 700;
        margin: 0;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .card-title-icon {
        background: rgba(255, 255, 255, 0.2);
        padding: 0.5rem;
        border-radius: var(--border-radius);
        backdrop-filter: blur(10px);
    }

    /* Table Enhancement */
    .professional-table {
        margin: 0;
        background: transparent;
    }

    .professional-table thead th {
        
        color: var(--text-primary);
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 1rem;
        border: none;
        font-size: 0.75rem;
        position: relative;
        border-bottom: 2px solid var(--border-color);
    }

    .professional-table tbody tr {
        transition: var(--transition-smooth);
        border: none;
        animation: slideInUp 0.6s ease-out forwards;
        opacity: 0;
        transform: translateY(20px);
       
    }

    .professional-table tbody tr:nth-child(1) { animation-delay: 0.1s; }
    .professional-table tbody tr:nth-child(2) { animation-delay: 0.2s; }
    .professional-table tbody tr:nth-child(3) { animation-delay: 0.3s; }
    .professional-table tbody tr:nth-child(4) { animation-delay: 0.4s; }
    .professional-table tbody tr:nth-child(5) { animation-delay: 0.5s; }

    .professional-table tbody tr:hover {
        background: linear-gradient(135deg, rgba(37, 99, 235, 0.08) 0%, rgba(251, 191, 36, 0.08) 100%);
        transform: translateX(8px);
        box-shadow: var(--shadow-light);
    }

    .professional-table tbody td {
        padding: 1.25rem 1rem;
        border: none;
        border-bottom: 1px solid var(--border-color);
        vertical-align: middle;
    }

    /* Vehicle Avatar Enhancement */
    .vehicle-avatar {
        width: 48px;
        height: 48px;
        border-radius: var(--border-radius);
        border: 3px solid var(--accent-yellow);
        transition: var(--transition-bounce);
        background: #ffffff;
        padding: 4px;
        box-shadow: var(--shadow-light);
    }

    .vehicle-avatar:hover {
        transform: scale(1.1) rotate(5deg);
        border-color: var(--primary-blue);
        box-shadow: var(--shadow-medium);
    }

    /* Vehicle Info Enhancement */
    .vehicle-info h6 {
        color: var(--text-primary);
        font-weight: 700;
        margin-bottom: 0.25rem;
        font-size: 0.95rem;
    }

    .vehicle-info p {
        color: var(--text-secondary);
        font-size: 0.8rem;
        margin: 0;
    }

    /* Status Badge Enhancement */
    .status-badge {
        padding: 0.5rem 1rem;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border: none;
        position: relative;
        overflow: hidden;
        transition: var(--transition-smooth);
        box-shadow: var(--shadow-light);
    }

    .status-available {
        background: linear-gradient(135deg, var(--success-color), #34d399);
        color: white;
    }

    .status-rented {
        background: linear-gradient(135deg, var(--accent-yellow), var(--accent-yellow-light));
        color: white;
    }

    .status-maintenance {
        background: linear-gradient(135deg, var(--danger-color), #f87171);
        color: white;
    }

    .status-badge::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transition: var(--transition-smooth);
    }

    .status-badge:hover::before {
        left: 100%;
    }

    /* Progress Bar Enhancement */
    .progress-professional {
        height: 8px;
        border-radius: 50px;
        background: var(--border-color);
        overflow: hidden;
        position: relative;
        box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .progress-bar-professional {
        height: 100%;
        border-radius: 50px;
        background: linear-gradient(90deg, var(--primary-blue), var(--accent-yellow));
        transition: var(--transition-smooth);
        position: relative;
        overflow: hidden;
        box-shadow: var(--shadow-light);
    }

    .progress-bar-professional::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.5), transparent);
        animation: shimmer 2s infinite;
    }

    /* Action Button Enhancement */
    .action-btn {
        background: #ffffff;
        border: 2px solid var(--border-color);
        color: var(--neutral-grey);
        padding: 0.5rem;
        border-radius: var(--border-radius);
        transition: var(--transition-bounce);
        position: relative;
        overflow: hidden;
        box-shadow: var(--shadow-light);
    }

    .action-btn:hover {
        background: var(--primary-blue);
        border-color: var(--primary-blue);
        color: white;
        transform: scale(1.1);
        box-shadow: var(--shadow-medium);
    }

    /* Add Vehicle Button */
    .add-vehicle-btn {
        background: linear-gradient(135deg, var(--accent-yellow), var(--accent-yellow-light));
        color: white;
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: var(--border-radius);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        transition: var(--transition-bounce);
        position: relative;
        overflow: hidden;
        box-shadow: var(--shadow-medium);
    }

    .add-vehicle-btn:hover {
        background: linear-gradient(135deg, var(--accent-yellow-dark), var(--accent-yellow));
        transform: translateY(-2px);
        box-shadow: var(--shadow-heavy);
    }

    .add-vehicle-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transition: var(--transition-smooth);
    }

    .add-vehicle-btn:hover::before {
        left: 100%;
    }

    /* Text Colors */
    .text-revenue-positive {
        color: var(--success-color);
        font-weight: 700;
    }

    .text-revenue-negative {
        color: var(--danger-color);
        font-weight: 700;
    }

    .text-status-excellent {
        color: var(--success-color);
        font-weight: 700;
    }

    .text-status-good {
        color: var(--accent-yellow-dark);
        font-weight: 700;
    }

    .text-status-maintenance {
        color: var(--danger-color);
        font-weight: 700;
    }

    /* Animations */
    @keyframes slideInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes shimmer {
        0% { left: -100%; }
        100% { left: 100%; }
    }

    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.7; }
    }

    @keyframes bounce {
        0%, 20%, 53%, 80%, 100% { transform: translate3d(0, 0, 0); }
        40%, 43% { transform: translate3d(0, -8px, 0); }
        70% { transform: translate3d(0, -4px, 0); }
        90% { transform: translate3d(0, -2px, 0); }
    }

    /* Loading Animation */
    .loading-shimmer {
        background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
        background-size: 200% 100%;
        animation: shimmer 1.5s infinite;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .vehicles-container {
            padding: 1rem 0;
        }
        
        .card-header-professional {
            padding: 1rem;
        }
        
        .professional-table tbody td {
            padding: 0.75rem 0.5rem;
        }
        
        .vehicle-avatar {
            width: 40px;
            height: 40px;
        }
    }

    /* Ripple effect */
    .ripple {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.6);
        transform: scale(0);
        animation: ripple-animation 0.6s linear;
        pointer-events: none;
    }

    @keyframes ripple-animation {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }

    /* Clean Card Body */
    .card-body {
       
    }

    .table-responsive {
        
        border-radius: 0 0 var(--border-radius-lg) var(--border-radius-lg);
    }

    /* Clean Borders */
    .professional-card {
        border: 1px solid rgba(229, 231, 235, 0.6);
    }

    .professional-table tbody tr {
        border-bottom: 1px solid rgba(229, 231, 235, 0.5);
    }

    /* Clean Hover Effects */
    .professional-card:hover {
        border-color: rgba(37, 99, 235, 0.3);
    }
</style>
@endsection

@section('main_content')
<div class="vehicles-container">
    <!-- Main Vehicles Table -->
    <div class="row">
        <div class="col-12">
            <div class="professional-card my-4">
                <div class="card-header-professional">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="card-title-professional">
                            <div class="card-title-icon">
                                <i class="material-icons">directions_car</i>
                            </div>
                            Vehicle Fleet Management
                        </h6>
                      <a href="{{ route('users.create') }}" class="add-vehicle-btn">
    <i class="material-icons me-2">add</i>
    Add Vehicle
</a>

                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="professional-table table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th>Vehicle</th>
                                    <th>License Plate</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Registration Date</th>
                                   
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Sample Vehicle Data -->
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1 align-items-center">
                                            <div>
                                                <img src="https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" 
                                                     class="vehicle-avatar me-3" alt="BMW">
                                            </div>
                                            <div class="vehicle-info">
                                                <h6 class="mb-0">BMW X5</h6>
                                                <p class="mb-0">Model: 2023 • Luxury SUV</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">ABC / 1234 / 56</p>
                                        <p class="text-xs text-secondary mb-0">Morocco</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="status-badge status-available">Available</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-sm font-weight-bold">15/03/2023</span>
                                    </td>
                                   
                                    <td class="align-middle text-center">
                                        <button class="action-btn me-2" title="Edit">
                                            <i class="material-icons text-sm">edit</i>
                                        </button>
                                        <button class="action-btn" title="Delete">
                                            <i class="material-icons text-sm">delete</i>
                                        </button>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1 align-items-center">
                                            <div>
                                                <img src="https://images.unsplash.com/photo-1552519507-da3b142c6e3d?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" 
                                                     class="vehicle-avatar me-3" alt="Mercedes">
                                            </div>
                                            <div class="vehicle-info">
                                                <h6 class="mb-0">Mercedes C-Class</h6>
                                                <p class="mb-0">Model: 2022 • Executive Sedan</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">DEF / 5678 / 90</p>
                                        <p class="text-xs text-secondary mb-0">Morocco</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="status-badge status-rented">Rented</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-sm font-weight-bold">22/01/2023</span>
                                    </td>
                                    
                                    <td class="align-middle text-center">
                                        <button class="action-btn me-2" title="Edit">
                                            <i class="material-icons text-sm">edit</i>
                                        </button>
                                        <button class="action-btn" title="Delete">
                                            <i class="material-icons text-sm">delete</i>
                                        </button>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1 align-items-center">
                                            <div>
                                                <img src="https://images.unsplash.com/photo-1544636331-e26879cd4d9b?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" 
                                                     class="vehicle-avatar me-3" alt="Audi">
                                            </div>
                                            <div class="vehicle-info">
                                                <h6 class="mb-0">Audi A8</h6>
                                                <p class="mb-0">Model: 2023 • Luxury Sedan</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">GHI / 9012 / 34</p>
                                        <p class="text-xs text-secondary mb-0">Morocco</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="status-badge status-maintenance">Maintenance</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-sm font-weight-bold">08/02/2023</span>
                                    </td>
                                   
                                    <td class="align-middle text-center">
                                        <button class="action-btn me-2" title="Edit">
                                            <i class="material-icons text-sm">edit</i>
                                        </button>
                                        <button class="action-btn" title="Delete">
                                            <i class="material-icons text-sm">delete</i>
                                        </button>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1 align-items-center">
                                            <div>
                                                <img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" 
                                                     class="vehicle-avatar me-3" alt="Toyota">
                                            </div>
                                            <div class="vehicle-info">
                                                <h6 class="mb-0">Toyota Camry</h6>
                                                <p class="mb-0">Model: 2022 • Mid-size Sedan</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">JKL / 3456 / 78</p>
                                        <p class="text-xs text-secondary mb-0">Morocco</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="status-badge status-available">Available</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-sm font-weight-bold">12/04/2023</span>
                                    </td>
                                    
                                    <td class="align-middle text-center">
                                        <button class="action-btn me-2" title="Edit">
                                            <i class="material-icons text-sm">edit</i>
                                        </button>
                                        <button class="action-btn" title="Delete">
                                            <i class="material-icons text-sm">delete</i>
                                        </button>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1 align-items-center">
                                            <div>
                                                <img src="https://images.unsplash.com/photo-1555215695-3004980ad54e?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" 
                                                     class="vehicle-avatar me-3" alt="Porsche">
                                            </div>
                                            <div class="vehicle-info">
                                                <h6 class="mb-0">Porsche 911</h6>
                                                <p class="mb-0">Model: 2023 • Sports Car</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">MNO / 7890 / 12</p>
                                        <p class="text-xs text-secondary mb-0">Morocco</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="status-badge status-available">Available</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-sm font-weight-bold">28/02/2023</span>
                                    </td>
                                    
                                    <td class="align-middle text-center">
                                        <button class="action-btn me-2" title="Edit">
                                            <i class="material-icons text-sm">edit</i>
                                        </button>
                                        <button class="action-btn" title="Delete">
                                            <i class="material-icons text-sm">delete</i>
                                        </button>
                                    </td>
                                </tr>

                                <!-- Dynamic content from database -->
                                @if(isset($cars))
                                    @foreach ($cars as $car)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1 align-items-center">
                                                <div>
                                                    <img src="../assets/img/small-logos/{{ $car->marque}}.svg" 
                                                         class="vehicle-avatar me-3" alt="{{ $car->marque}}">
                                                </div>
                                                <div class="vehicle-info">
                                                    <h6 class="mb-0">{{ $car->marque}} {{ $car->model}}</h6>
                                                    <p class="mb-0">Model: 2022</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ $car->matriculG}} / {{ $car->matriculL}} / {{ $car->matriculS}}</p>
                                            <p class="text-xs text-secondary mb-0">Morocco</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="status-badge status-available">Available</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-sm font-weight-bold">23/04/18</span>
                                        </td>
                                       
                                        <td class="align-middle text-center">
    <a href="{{ route('users.edit', $car->id) }}" class="action-btn me-2" title="Edit">
    <i class="material-icons text-sm">edit</i>
</a>


   <form action="{{ route('users.destroy', $car->id) }}" method="POST" style="display:inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" class="action-btn" onclick="return confirm('Are you sure?')" title="Delete">
        <i class="material-icons text-sm">delete</i>
    </button>
</form>


</td>

                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Vehicle Performance Status -->
    <div class="row">
        <div class="col-12">
            <div class="professional-card my-4">
                <div class="card-header-professional">
                    <h6 class="card-title-professional">
                        <div class="card-title-icon">
                            <i class="material-icons">analytics</i>
                        </div>
                        Vehicle Performance & Status
                    </h6>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="professional-table table align-items-center justify-content-center mb-0">
                            <thead>
                                <tr>
                                    <th>Vehicle</th>
                                    <th>Revenue</th>
                                    <th>Status</th>
                                    <th class="text-center">Performance</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 align-items-center">
                                            <div>
                                                <img src="https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" 
                                                     class="vehicle-avatar me-3" alt="BMW">
                                            </div>
                                            <div class="vehicle-info">
                                                <h6 class="mb-0">BMW X5</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0 text-revenue-positive">$4,500</p>
                                        <p class="text-xs text-secondary mb-0">This month</p>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold text-status-excellent">Excellent</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <span class="me-2 text-xs font-weight-bold">85%</span>
                                            <div class="progress-professional" style="width: 100px;">
                                                <div class="progress-bar-professional" style="width: 85%;"></div>
                                            </div>
                                        </div>
                                    </td>
                                    
                                </tr>

                                <tr>
                                    <td>
                                        <div class="d-flex px-2 align-items-center">
                                            <div>
                                                <img src="https://images.unsplash.com/photo-1552519507-da3b142c6e3d?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" 
                                                     class="vehicle-avatar me-3" alt="Mercedes">
                                            </div>
                                            <div class="vehicle-info">
                                                <h6 class="mb-0">Mercedes C-Class</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0 text-revenue-positive">$3,200</p>
                                        <p class="text-xs text-secondary mb-0">This month</p>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold text-status-good">Good</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <span class="me-2 text-xs font-weight-bold">72%</span>
                                            <div class="progress-professional" style="width: 100px;">
                                                <div class="progress-bar-professional" style="width: 72%;"></div>
                                            </div>
                                        </div>
                                    </td>
                                    
                                </tr>

                                <tr>
                                    <td>
                                        <div class="d-flex px-2 align-items-center">
                                            <div>
                                                <img src="https://images.unsplash.com/photo-1544636331-e26879cd4d9b?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" 
                                                     class="vehicle-avatar me-3" alt="Audi">
                                            </div>
                                            <div class="vehicle-info">
                                                <h6 class="mb-0">Audi A8</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0 text-revenue-negative">$800</p>
                                        <p class="text-xs text-secondary mb-0">This month</p>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold text-status-maintenance">Maintenance</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <span class="me-2 text-xs font-weight-bold">25%</span>
                                            <div class="progress-professional" style="width: 100px;">
                                                <div class="progress-bar-professional" style="width: 25%;"></div>
                                            </div>
                                        </div>
                                    </td>
                                    
                                </tr>

                                <tr>
                                    <td>
                                        <div class="d-flex px-2 align-items-center">
                                            <div>
                                                <img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" 
                                                     class="vehicle-avatar me-3" alt="Toyota">
                                            </div>
                                            <div class="vehicle-info">
                                                <h6 class="mb-0">Toyota Camry</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0 text-revenue-positive">$2,800</p>
                                        <p class="text-xs text-secondary mb-0">This month</p>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold text-status-excellent">Active</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <span class="me-2 text-xs font-weight-bold">68%</span>
                                            <div class="progress-professional" style="width: 100px;">
                                                <div class="progress-bar-professional" style="width: 68%;"></div>
                                            </div>
                                        </div>
                                    </td>
                                   
                                </tr>

                                <tr>
                                    <td>
                                        <div class="d-flex px-2 align-items-center">
                                            <div>
                                                <img src="https://images.unsplash.com/photo-1555215695-3004980ad54e?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" 
                                                     class="vehicle-avatar me-3" alt="Porsche">
                                            </div>
                                            <div class="vehicle-info">
                                                <h6 class="mb-0">Porsche 911</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0 text-revenue-positive">$6,200</p>
                                        <p class="text-xs text-secondary mb-0">This month</p>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold text-status-excellent">Premium</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <span class="me-2 text-xs font-weight-bold">92%</span>
                                            <div class="progress-professional" style="width: 100px;">
                                                <div class="progress-bar-professional" style="width: 92%;"></div>
                                            </div>
                                        </div>
                                    </td>
                                   
                                </tr>

                                <!-- Dynamic content from database -->
                                @if(isset($voittures))
                                    @foreach ($voittures as $voitture)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 align-items-center">
                                                <div>
                                                    <img src="../assets/img/small-logos/{{ $voitture->marque}}.svg" 
                                                         class="vehicle-avatar me-3" alt="{{ $voitture->marque}}">
                                                </div>
                                                <div class="vehicle-info">
                                                    <h6 class="mb-0">{{ $voitture->marque}} {{ $voitture->model}}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">$2,500</p>
                                        </td>
                                        <td>
                                            <span class="text-xs font-weight-bold">Working</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <span class="me-2 text-xs font-weight-bold">60%</span>
                                                <div class="progress-professional" style="width: 100px;">
                                                    <div class="progress-bar-professional" style="width: 60%;"></div>
                                                </div>
                                            </div>
                                        </td>
                                        
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Professional JavaScript enhancements
    $(document).ready(function() {
        // Set current date for new vehicle registration
        var now = new Date();
        var month = (now.getMonth() + 1);                   
        var day = now.getDate();
        if (month < 10) month = "0" + month;
        if (day < 10) day = "0" + day;
        var today = now.getFullYear() + '-' + month + '-' + day;
        $('#d_Compteurcar_add').val(today);

        // Add professional animations on scroll
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

        // Observe all table rows
        document.querySelectorAll('.professional-table tbody tr').forEach(row => {
            observer.observe(row);
        });

        // Add hover effects for cards
        $('.professional-card').hover(
            function() {
                $(this).addClass('shadow-lg');
            },
            function() {
                $(this).removeClass('shadow-lg');
            }
        );

        // Professional loading states
        $('.action-btn').click(function() {
            const btn = $(this);
            const originalContent = btn.html();
            btn.html('<i class="material-icons">hourglass_empty</i>');
            btn.prop('disabled', true);
            
            setTimeout(() => {
                btn.html(originalContent);
                btn.prop('disabled', false);
            }, 1000);
        });
    });

    // Add new vehicle function
    function addNewVehicle() {
        // Professional modal or redirect logic
        console.log('Adding new vehicle...');
        // You can implement modal or redirect to add vehicle form
    }

    // Professional table interactions
    document.addEventListener('DOMContentLoaded', function() {
        // Add ripple effect to buttons
        const buttons = document.querySelectorAll('.action-btn, .add-vehicle-btn');
        buttons.forEach(button => {
            button.addEventListener('click', function(e) {
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;
                
                ripple.style.width = ripple.style.height = size + 'px';
                ripple.style.left = x + 'px';
                ripple.style.top = y + 'px';
                ripple.classList.add('ripple');
                
                this.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });
    });
</script>
@endsection
