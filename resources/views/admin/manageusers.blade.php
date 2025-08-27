@extends('layouts.app')

@section('head')
<style>
    /* Professional User Management Styling - Light Mode */
    :root {
        --primary-blue: #2563eb;
        --primary-blue-light: #3b82f6;
        --primary-blue-dark: #1d4ed8;
        --accent-yellow: #fbbf24;
        --accent-yellow-light: #fcd34d;
        --success-color: #10b981;
        --warning-color: #f59e0b;
        --danger-color: #ef4444;
        --bg-primary: #ffffff;
        --bg-secondary: #f8fafc;
        --bg-card: #ffffff;
        --bg-card-hover: #f1f5f9;
        --text-primary: #1e293b;
        --text-secondary: #475569;
        --text-muted: #64748b;
        --border-color: #e2e8f0;
        --border-color-light: #f1f5f9;
        --border-radius: 16px;
        --border-radius-sm: 8px;
        --transition-smooth: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }

    body {
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        color: var(--text-primary);
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        line-height: 1.6;
    }

    /* Container and Layout */
    .main-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 2rem;
    }

    .page-header {
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-blue-light) 100%);
        border-radius: var(--border-radius);
        padding: 2rem;
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
        box-shadow: var(--shadow-lg);
    }

    .page-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="0.5"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
        opacity: 0.3;
    }

    .page-header-content {
        position: relative;
        z-index: 2;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .page-title {
        display: flex;
        align-items: center;
        color: white;
        margin: 0;
    }

    .page-title i {
        font-size: 2.5rem;
        margin-right: 1rem;
        opacity: 0.9;
    }

    .page-title h1 {
        font-size: 2rem;
        font-weight: 700;
        margin: 0;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .breadcrumb {
        background: rgba(255, 255, 255, 0.1);
        border-radius: var(--border-radius-sm);
        padding: 0.75rem 1.25rem;
        color: rgba(255, 255, 255, 0.8);
        font-size: 0.9rem;
    }

    /* Alert Styling */
    .alert {
        border-radius: var(--border-radius);
        border: none;
        padding: 1.25rem 1.5rem;
        margin-bottom: 1.5rem;
        font-weight: 600;
        box-shadow: var(--shadow-md);
        position: relative;
        overflow: hidden;
    }

    .alert::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 4px;
    }

    .alert-success {
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, rgba(34, 197, 94, 0.1) 100%);
        color: var(--success-color);
        border: 1px solid rgba(16, 185, 129, 0.2);
    }

    .alert-success::before {
        background: var(--success-color);
    }

    .alert-warning {
        background: linear-gradient(135deg, rgba(245, 158, 11, 0.1) 0%, rgba(251, 191, 36, 0.1) 100%);
        color: var(--warning-color);
        border: 1px solid rgba(245, 158, 11, 0.2);
    }

    .alert-warning::before {
        background: var(--warning-color);
    }

    .alert-info {
        background: linear-gradient(135deg, rgba(37, 99, 235, 0.1) 0%, rgba(59, 130, 246, 0.1) 100%);
        color: var(--primary-blue);
        border: 1px solid rgba(37, 99, 235, 0.2);
    }

    .alert-info::before {
        background: var(--primary-blue);
    }

    /* Card Styling */
    .professional-card {
        background: var(--bg-card);
        border: 1px solid var(--border-color);
        border-radius: var(--border-radius);
        box-shadow: var(--shadow-lg);
        transition: var(--transition-smooth);
        overflow: hidden;
        margin-bottom: 2rem;
    }

    .professional-card:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-xl);
        border-color: var(--primary-blue-light);
    }

    .card-header-professional {
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-blue-light) 100%);
        padding: 1.5rem 2rem;
        position: relative;
        overflow: hidden;
    }

    .card-header-professional::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="dots" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23dots)"/></svg>');
    }

    .card-header-professional h4 {
        position: relative;
        z-index: 2;
        margin: 0;
        color: white;
        font-weight: 700;
        font-size: 1.25rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        display: flex;
        align-items: center;
    }

    .card-header-professional h4 i {
        margin-right: 0.75rem;
        font-size: 1.5rem;
    }

    .card-body-professional {
        padding: 2rem;
        background: var(--bg-card);
    }

    /* Navigation Tabs */
    .nav-tabs-professional {
        display: flex;
        background: var(--bg-secondary);
        border-radius: var(--border-radius-sm);
        padding: 0.5rem;
        margin-bottom: 2rem;
        box-shadow: var(--shadow-sm);
    }

    .nav-tab {
        flex: 1;
        text-align: center;
        padding: 1rem 1.5rem;
        background: transparent;
        border: none;
        border-radius: var(--border-radius-sm);
        color: var(--text-secondary);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        transition: var(--transition-smooth);
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .nav-tab.active {
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-blue-light) 100%);
        color: white;
        box-shadow: var(--shadow-md);
    }

    .nav-tab:hover:not(.active) {
        background: var(--bg-card-hover);
        color: var(--text-primary);
    }

    /* Table Styling */
    .table-container {
        background: var(--bg-card);
        border-radius: var(--border-radius);
        overflow: hidden;
        box-shadow: var(--shadow-md);
        border: 1px solid var(--border-color);
    }

    .table-professional {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        background: transparent;
    }

    .table-professional thead {
        background: linear-gradient(135deg, var(--bg-secondary) 0%, var(--border-color-light) 100%);
    }

    .table-professional th {
        color: var(--text-primary);
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 1.5rem 1.25rem;
        border: none;
        font-size: 0.875rem;
        position: sticky;
        top: 0;
        z-index: 10;
        border-bottom: 2px solid var(--border-color);
    }

    .table-professional td {
        padding: 1.25rem;
        border: none;
        border-bottom: 1px solid var(--border-color-light);
        background: var(--bg-card);
        color: var(--text-primary);
        transition: var(--transition-smooth);
        vertical-align: middle;
    }

    .table-professional tbody tr:hover td {
        background: var(--bg-card-hover);
        border-color: var(--primary-blue-light);
    }

    .table-professional tbody tr:last-child td {
        border-bottom: none;
    }

    /* User Avatar */
    .user-avatar {
        width: 48px;
        height: 48px;
        background: linear-gradient(135deg, var(--primary-blue), var(--accent-yellow));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 700;
        font-size: 1.1rem;
        margin-right: 1rem;
        box-shadow: var(--shadow-md);
    }

    .user-info {
        display: flex;
        align-items: center;
    }

    .user-details h6 {
        margin: 0 0 0.25rem 0;
        font-weight: 600;
        color: var(--text-primary);
        font-size: 1rem;
    }

    .user-details p {
        margin: 0;
        font-size: 0.875rem;
        color: var(--text-muted);
    }

    /* Action Buttons */
    .action-buttons {
        display: flex;
        gap: 0.5rem;
    }

    .action-btn {
        background: var(--bg-secondary);
        border: 1px solid var(--border-color);
        border-radius: var(--border-radius-sm);
        padding: 0.75rem;
        transition: var(--transition-smooth);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        text-decoration: none;
    }

    .action-btn:hover {
        background: var(--primary-blue);
        border-color: var(--primary-blue);
        color: white;
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    }

    .action-btn.danger:hover {
        background: var(--danger-color);
        border-color: var(--danger-color);
        color: white;
    }

    .action-btn i {
        font-size: 1.125rem;
        color: var(--text-secondary);
        transition: var(--transition-smooth);
    }

    .action-btn:hover i {
        color: white;
    }

    /* Form Styling */
    .form-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .form-group {
        position: relative;
    }

    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        color: var(--text-primary);
        font-weight: 600;
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .form-control-professional {
        width: 100%;
        background: var(--bg-secondary);
        border: 2px solid var(--border-color);
        border-radius: var(--border-radius-sm);
        color: var(--text-primary);
        padding: 1rem 1.25rem;
        font-size: 1rem;
        transition: var(--transition-smooth);
        font-family: inherit;
    }

    .form-control-professional:focus {
        outline: none;
        border-color: var(--primary-blue);
        background: var(--bg-card);
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }

    .form-control-professional::placeholder {
        color: var(--text-muted);
        font-weight: 500;
    }

    .form-control-professional.is-invalid {
        border-color: var(--danger-color);
        box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1);
    }

    .invalid-feedback {
        color: var(--danger-color);
        font-size: 0.875rem;
        margin-top: 0.5rem;
        font-weight: 600;
        display: block;
    }

    /* Button Styling */
    .btn-professional {
        border-radius: var(--border-radius-sm);
        padding: 1rem 2rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        transition: var(--transition-smooth);
        border: none;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        text-decoration: none;
        font-size: 0.875rem;
        min-width: 140px;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-blue-light) 100%);
        color: white;
        box-shadow: var(--shadow-md);
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, var(--primary-blue-dark) 0%, var(--primary-blue) 100%);
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
    }

    .btn-warning {
        background: linear-gradient(135deg, var(--accent-yellow) 0%, var(--accent-yellow-light) 100%);
        color: white;
        box-shadow: var(--shadow-md);
    }

    .btn-warning:hover {
        background: linear-gradient(135deg, var(--warning-color) 0%, var(--accent-yellow) 100%);
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
    }

    .btn-secondary {
        background: linear-gradient(135deg, var(--bg-secondary) 0%, var(--border-color) 100%);
        color: var(--text-secondary);
        border: 1px solid var(--border-color);
        box-shadow: var(--shadow-sm);
    }

    .btn-secondary:hover {
        background: linear-gradient(135deg, var(--bg-card-hover) 0%, var(--bg-secondary) 100%);
        color: var(--text-primary);
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    }

    .btn-danger {
        background: linear-gradient(135deg, var(--danger-color) 0%, #f87171 100%);
        color: white;
        box-shadow: var(--shadow-md);
    }

    .btn-danger:hover {
        background: linear-gradient(135deg, #dc2626 0%, var(--danger-color) 100%);
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
    }

    /* Modal Styling */
    .modal-content {
        background: var(--bg-card);
        border: 1px solid var(--border-color);
        border-radius: var(--border-radius);
        box-shadow: var(--shadow-xl);
    }

    .modal-header {
        background: linear-gradient(135deg, var(--danger-color) 0%, #f87171 100%);
        border-bottom: 1px solid var(--border-color);
        border-radius: var(--border-radius) var(--border-radius) 0 0;
        padding: 1.5rem 2rem;
    }

    .modal-header h5 {
        color: white;
        font-weight: 700;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .modal-header .close {
        color: white;
        opacity: 0.8;
        font-size: 1.5rem;
        border: none;
        background: none;
        cursor: pointer;
        padding: 0;
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        transition: var(--transition-smooth);
    }

    .modal-header .close:hover {
        opacity: 1;
        background: rgba(255, 255, 255, 0.1);
    }

    .modal-body {
        background: var(--bg-card);
        color: var(--text-primary);
        padding: 2rem;
    }

    .modal-footer {
        background: var(--bg-secondary);
        border-top: 1px solid var(--border-color);
        padding: 1.5rem 2rem;
        border-radius: 0 0 var(--border-radius) var(--border-radius);
        display: flex;
        gap: 1rem;
        justify-content: flex-end;
    }

    .delete-confirmation {
        text-align: center;
    }

    .delete-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, var(--danger-color), #f87171);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        box-shadow: var(--shadow-lg);
    }

    .delete-icon i {
        font-size: 2rem;
        color: white;
    }

    /* Animation Classes */
    .fade-in {
        animation: fadeInUp 0.6s ease-out;
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

    /* Loading States */
    .btn-professional:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none !important;
    }

    .btn-professional.loading {
        position: relative;
        color: transparent;
    }

    .btn-professional.loading::after {
        content: '';
        position: absolute;
        width: 20px;
        height: 20px;
        top: 50%;
        left: 50%;
        margin-left: -10px;
        margin-top: -10px;
        border: 2px solid transparent;
        border-top-color: currentColor;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .main-container {
            padding: 1rem;
        }
        
        .page-header {
            padding: 1.5rem;
        }
        
        .page-header-content {
            flex-direction: column;
            gap: 1rem;
            text-align: center;
        }
        
        .page-title h1 {
            font-size: 1.5rem;
        }
        
        .card-body-professional {
            padding: 1.5rem;
        }
        
        .form-grid {
            grid-template-columns: 1fr;
            gap: 1rem;
        }
        
        .nav-tabs-professional {
            flex-direction: column;
            gap: 0.5rem;
        }
        
        .table-professional {
            font-size: 0.875rem;
        }
        
        .table-professional th,
        .table-professional td {
            padding: 0.75rem 0.5rem;
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            font-size: 1rem;
        }
        
        .action-buttons {
            flex-direction: column;
            gap: 0.25rem;
        }
        
        .btn-professional {
            padding: 0.75rem 1rem;
            font-size: 0.8rem;
            min-width: 120px;
        }
        
        .modal-body,
        .modal-footer {
            padding: 1.5rem;
        }
    }

    /* Hidden radio buttons */
    input[type="radio"] {
        display: none;
    }

    /* View containers */
    .view-container {
        transition: var(--transition-smooth);
        opacity: 1;
        transform: translateY(0);
    }

    .view-container.hidden {
        display: none;
    }
</style>
@endsection

@section('title_nav')
<div class="container">
    <i class="large material-icons opacity-10" style="margin-right: 6px;vertical-align: middle; font-size: 30px">group</i>
    <span style="vertical-align: middle;">Gestion Users</span>
</div>
@endsection

@section('href_nav')
href="{{ Route("home") }}"
@endsection

@section('name_nav')
    Home
    {{-- input hidden --}}
    <div style="display: none">
        <input type="radio" name="mang-users" id="radio-list-users" checked>
        <input type="radio" name="mang-users" id="radio-add-user">
        <input type="radio" name="mang-users" id="radio-update-user">
    </div>
@endsection

@section('icon_nav')
    <i class="bi bi-house-lock-fill opacity-6 text-dark me-1"></i>
@endsection

@section('content')
<div class="main-container">
    

    <!-- Alert Messages -->
    @if (session('success'))
        <div class="alert alert-success fade-in">
            <i class="material-icons" style="margin-right: 0.75rem; vertical-align: middle;">check_circle</i>
            <strong>Success!</strong> {{session('success')}}
        </div>
    @endif

    @if (session('warning'))
        <div class="alert alert-warning fade-in">
            <i class="material-icons" style="margin-right: 0.75rem; vertical-align: middle;">warning</i>
            <strong>Warning!</strong> {{session('warning')}}
        </div>
    @endif

    @if (session('info'))
        <div class="alert alert-info fade-in">
            <i class="material-icons" style="margin-right: 0.75rem; vertical-align: middle;">info</i>
            <strong>Info!</strong> {{session('info')}}
        </div>
    @endif

    <!-- Navigation Tabs -->
    <div class="nav-tabs-professional">
        <button class="nav-tab active" id="tab-list-users">
            <i class="material-icons">list</i>
            User List
        </button>
        <button class="nav-tab" id="tab-add-user">
            <i class="material-icons">person_add</i>
            Add User
        </button>
        <button class="nav-tab" id="tab-update-user" style="display: none;">
            <i class="material-icons">edit</i>
            Update User
        </button>
    </div>

    <!-- List Users View -->
    <div class="view-container" id="list-users">
        <div class="professional-card fade-in">
            <div class="card-header-professional">
                <h4>
                    <i class="material-icons">people</i>
                    Users Database
                </h4>
            </div>
            <div class="card-body-professional">
                <div class="table-container">
                    <table class="table-professional">
                        <thead>
                            <tr>
                                <th>
                                    <i class="material-icons" style="font-size: 1rem; margin-right: 0.5rem; vertical-align: middle;">person</i>
                                    User Information
                                </th>
                                <th>
                                    <i class="material-icons" style="font-size: 1rem; margin-right: 0.5rem; vertical-align: middle;">email</i>
                                    Contact Details
                                </th>
                                <th>
                                    <i class="material-icons" style="font-size: 1rem; margin-right: 0.5rem; vertical-align: middle;">settings</i>
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($utils as $util)
                            <tr>
                                <td>
                                    <div class="user-info">
                                        <div class="user-avatar">
                                            {{ strtoupper(substr($util->username, 0, 2)) }}
                                        </div>
                                        <div class="user-details">
                                            <h6>{{ $util->username }}</h6>
                                            <p>User ID: #{{ str_pad($util->id, 4, '0', STR_PAD_LEFT) }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="user-details">
                                        <h6>{{ $util->email }}</h6>
                                        <p>
                                            <i class="material-icons" style="font-size: 0.875rem; margin-right: 0.25rem; vertical-align: middle;">verified_user</i>
                                            Active Account
                                        </p>
                                    </div>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="action-btn" onclick="editUser({{ $util->id }})" title="Edit User">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button class="action-btn danger" onclick="deletUser({{ $util->id }})" title="Delete User">
                                            <i class="material-icons">delete</i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div style="margin-top: 2rem; text-align: center;">
                    <button id="btn_add" type="button" class="btn-professional btn-primary">
                        <i class="material-icons">add</i>
                        Add New User
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add User View -->
    <div class="view-container hidden" id="add-user">
        <div class="professional-card fade-in">
            <div class="card-header-professional">
                <h4>
                    <i class="material-icons">person_add</i>
                    Create New User Account
                </h4>
            </div>
            <div class="card-body-professional">
                <form method="POST" action="{{ Route('admin.store') }}" role="form">
                    @csrf
                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label" for="name">
                                <i class="material-icons" style="font-size: 1rem; margin-right: 0.5rem; vertical-align: middle;">person</i>
                                First Name
                            </label>
                            <input 
                                placeholder="Enter first name" 
                                id="name" 
                                type="text" 
                                class="form-control-professional @error('name') is-invalid @enderror" 
                                name="name" 
                                value="{{ old('name') }}" 
                                required 
                                autocomplete="name" 
                                autofocus
                            >
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="prenom">
                                <i class="material-icons" style="font-size: 1rem; margin-right: 0.5rem; vertical-align: middle;">person_outline</i>
                                Last Name
                            </label>
                            <input 
                                placeholder="Enter last name" 
                                id="prenom" 
                                type="text" 
                                class="form-control-professional @error('prenom') is-invalid @enderror" 
                                name="prenom" 
                                value="{{ old('prenom') }}" 
                                required 
                                autocomplete="prenom"
                            >
                            @error('prenom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="username">
                                <i class="material-icons" style="font-size: 1rem; margin-right: 0.5rem; vertical-align: middle;">account_circle</i>
                                Username
                            </label>
                            <input 
                                placeholder="Enter username" 
                                id="username" 
                                type="text" 
                                class="form-control-professional @error('username') is-invalid @enderror" 
                                name="username" 
                                value="{{ old('username') }}" 
                                required 
                                autocomplete="username"
                            >
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="email">
                                <i class="material-icons" style="font-size: 1rem; margin-right: 0.5rem; vertical-align: middle;">email</i>
                                Email Address
                            </label>
                            <input 
                                placeholder="Enter email address" 
                                id="email" 
                                type="email" 
                                class="form-control-professional @error('email') is-invalid @enderror" 
                                name="email" 
                                value="{{ old('email') }}" 
                                required 
                                autocomplete="email"
                            >
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="password">
                                <i class="material-icons" style="font-size: 1rem; margin-right: 0.5rem; vertical-align: middle;">lock</i>
                                Password
                            </label>
                            <input 
                                placeholder="Enter password" 
                                id="password" 
                                type="password" 
                                class="form-control-professional @error('password') is-invalid @enderror" 
                                name="password" 
                                required 
                                autocomplete="new-password"
                            >
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="password-confirm">
                                <i class="material-icons" style="font-size: 1rem; margin-right: 0.5rem; vertical-align: middle;">lock_outline</i>
                                Confirm Password
                            </label>
                            <input 
                                placeholder="Confirm password" 
                                id="password-confirm" 
                                type="password" 
                                class="form-control-professional" 
                                name="password_confirmation" 
                                required 
                                autocomplete="new-password"
                            >
                        </div>
                    </div>

                    <div style="display: flex; gap: 1rem; justify-content: center; margin-top: 2rem;">
                        <button type="submit" class="btn-professional btn-primary">
                            <i class="material-icons">save</i>
                            Create User
                        </button>
                        <button id="btn_anl_add" type="button" class="btn-professional btn-secondary">
                            <i class="material-icons">cancel</i>
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Update User View -->
    <div class="view-container hidden" id="update-user">
        <div class="professional-card fade-in">
            <div class="card-header-professional">
                <h4>
                    <i class="material-icons">edit</i>
                    Update User Account
                </h4>
            </div>
            <div class="card-body-professional">
                <form id="editUserForm" method="POST" action="{{ route('admin.update') }}" role="form">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="id">
                    
                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label" for="Editname">
                                <i class="material-icons" style="font-size: 1rem; margin-right: 0.5rem; vertical-align: middle;">person</i>
                                First Name
                            </label>
                            <input 
                                placeholder="Enter first name" 
                                id="Editname" 
                                type="text" 
                                class="form-control-professional @error('name') is-invalid @enderror" 
                                name="name" 
                                value="{{ old('name') }}" 
                                required 
                                autocomplete="name" 
                                autofocus
                            >
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="Editprenom">
                                <i class="material-icons" style="font-size: 1rem; margin-right: 0.5rem; vertical-align: middle;">person_outline</i>
                                Last Name
                            </label>
                            <input 
                                placeholder="Enter last name" 
                                id="Editprenom" 
                                type="text" 
                                class="form-control-professional @error('prenom') is-invalid @enderror" 
                                name="prenom" 
                                value="{{ old('prenom') }}" 
                                required 
                                autocomplete="prenom"
                            >
                            @error('prenom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="Editusername">
                                <i class="material-icons" style="font-size: 1rem; margin-right: 0.5rem; vertical-align: middle;">account_circle</i>
                                Username
                            </label>
                            <input 
                                placeholder="Enter username" 
                                id="Editusername" 
                                type="text" 
                                class="form-control-professional @error('username') is-invalid @enderror" 
                                name="username" 
                                value="{{ old('username') }}" 
                                required 
                                autocomplete="username"
                            >
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="Editemail">
                                <i class="material-icons" style="font-size: 1rem; margin-right: 0.5rem; vertical-align: middle;">email</i>
                                Email Address
                            </label>
                            <input 
                                placeholder="Enter email address" 
                                id="Editemail" 
                                type="email" 
                                class="form-control-professional @error('email') is-invalid @enderror" 
                                name="email" 
                                value="{{ old('email') }}" 
                                required 
                                autocomplete="email"
                            >
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="Editpassword">
                                <i class="material-icons" style="font-size: 1rem; margin-right: 0.5rem; vertical-align: middle;">lock</i>
                                New Password (Optional)
                            </label>
                            <input 
                                placeholder="Enter new password" 
                                id="Editpassword" 
                                type="password" 
                                class="form-control-professional @error('password') is-invalid @enderror" 
                                name="password" 
                                autocomplete="new-password"
                            >
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="Editpassword-confirm">
                                <i class="material-icons" style="font-size: 1rem; margin-right: 0.5rem; vertical-align: middle;">lock_outline</i>
                                Confirm New Password
                            </label>
                            <input 
                                placeholder="Confirm new password" 
                                id="Editpassword-confirm" 
                                type="password" 
                                class="form-control-professional" 
                                name="password_confirmation" 
                                autocomplete="new-password"
                            >
                        </div>
                    </div>

                    <div style="display: flex; gap: 1rem; justify-content: center; margin-top: 2rem;">
                        <button type="submit" class="btn-professional btn-warning">
                            <i class="material-icons">update</i>
                            Update User
                        </button>
                        <button id="btn_anl_up" type="button" class="btn-professional btn-secondary">
                            <i class="material-icons">cancel</i>
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Elements
    const radioListUsers = document.getElementById("radio-list-users");
    const radioAddUser = document.getElementById("radio-add-user");
    const radioUpdateUser = document.getElementById("radio-update-user");

    const listUsers = document.getElementById("list-users");
    const addUser = document.getElementById("add-user");
    const updateUser = document.getElementById("update-user");

    const tabListUsers = document.getElementById("tab-list-users");
    const tabAddUser = document.getElementById("tab-add-user");
    const tabUpdateUser = document.getElementById("tab-update-user");

    const btnAdd = document.getElementById("btn_add");
    const btnAnlAdd = document.getElementById("btn_anl_add");
    const btnAnlUp = document.getElementById("btn_anl_up");

    // View switching function
    function switchView(view) {
        // Hide all views
        [listUsers, addUser, updateUser].forEach(el => {
            el.classList.add('hidden');
        });

        // Remove active class from all tabs
        [tabListUsers, tabAddUser, tabUpdateUser].forEach(tab => {
            tab.classList.remove('active');
        });

        // Show selected view and activate tab
        switch(view) {
            case 'list':
                listUsers.classList.remove('hidden');
                tabListUsers.classList.add('active');
                tabUpdateUser.style.display = 'none';
                radioListUsers.checked = true;
                break;
            case 'add':
                addUser.classList.remove('hidden');
                tabAddUser.classList.add('active');
                tabUpdateUser.style.display = 'none';
                radioAddUser.checked = true;
                break;
            case 'update':
                updateUser.classList.remove('hidden');
                tabUpdateUser.classList.add('active');
                tabUpdateUser.style.display = 'flex';
                radioUpdateUser.checked = true;
                break;
        }
    }

    // Tab click events
    tabListUsers.addEventListener('click', () => switchView('list'));
    tabAddUser.addEventListener('click', () => switchView('add'));
    tabUpdateUser.addEventListener('click', () => switchView('update'));

    // Button events
    btnAdd.addEventListener('click', () => switchView('add'));
    btnAnlAdd.addEventListener('click', () => switchView('list'));
    btnAnlUp.addEventListener('click', () => switchView('list'));

    // Form submission loading states
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            const submitBtn = form.querySelector('button[type="submit"]');
            if (submitBtn) {
                submitBtn.classList.add('loading');
                submitBtn.disabled = true;
            }
        });
    });

    // Enhanced table row interactions
    const tableRows = document.querySelectorAll('.table-professional tbody tr');
    tableRows.forEach(row => {
        row.addEventListener('mouseenter', function() {
            this.style.transform = 'translateX(5px)';
        });
        
        row.addEventListener('mouseleave', function() {
            this.style.transform = 'translateX(0)';
        });
    });
});

// Enhanced user management functions
function editUser(id) {
    console.log("Editing user:", id);
    
    // Show loading state on action buttons
    const actionBtns = document.querySelectorAll('.action-btn');
    actionBtns.forEach(btn => {
        btn.style.pointerEvents = 'none';
        btn.style.opacity = '0.6';
    });
    
    // Switch to update view
    document.getElementById("tab-update-user").style.display = 'flex';
    switchView('update');

    // Enhanced AJAX call with better error handling
    $.get("/admin/admin/" + id)
        .done(function(user) {
            $('#Editname').val(user.name || '');
            $('#Editprenom').val(user.prenom || '');
            $('#Editusername').val(user.username || '');
            $('#Editemail').val(user.email || '');
            $('#id').val(user.id);
            
            // Focus on first input with delay for smooth transition
            setTimeout(() => {
                $('#Editname').focus();
            }, 300);
        })
        .fail(function(xhr, status, error) {
            console.error('Error loading user data:', error);
            
            // Show error alert
            const alertHtml = `
                <div class="alert alert-danger fade-in" style="margin-bottom: 1.5rem;">
                    <i class="material-icons" style="margin-right: 0.75rem; vertical-align: middle;">error</i>
                    <strong>Error!</strong> Failed to load user data. Please try again.
                </div>
            `;
            document.querySelector('.main-container').insertAdjacentHTML('afterbegin', alertHtml);
            
            // Auto remove alert after 5 seconds
            setTimeout(() => {
                const alert = document.querySelector('.alert-danger');
                if (alert) alert.remove();
            }, 5000);
            
            switchView('list');
        })
        .always(function() {
            // Re-enable action buttons
            actionBtns.forEach(btn => {
                btn.style.pointerEvents = 'auto';
                btn.style.opacity = '1';
            });
        });
}

function deletUser(id) {
    console.log("Deleting user:", id);
    $('#deletUserModal').modal('show');
    $('#deletUserForm').attr('action', "/admin/admin/" + id);
}

function modalclosebtn() {
    console.log("Closing modal");
    $('#deletUserModal').modal('hide');
}

// Utility function for view switching (used by edit function)
function switchView(view) {
    const listUsers = document.getElementById("list-users");
    const addUser = document.getElementById("add-user");
    const updateUser = document.getElementById("update-user");
    
    const tabListUsers = document.getElementById("tab-list-users");
    const tabAddUser = document.getElementById("tab-add-user");
    const tabUpdateUser = document.getElementById("tab-update-user");

    // Hide all views
    [listUsers, addUser, updateUser].forEach(el => {
        el.classList.add('hidden');
    });

    // Remove active class from all tabs
    [tabListUsers, tabAddUser, tabUpdateUser].forEach(tab => {
        tab.classList.remove('active');
    });

    // Show selected view and activate tab
    switch(view) {
        case 'list':
            listUsers.classList.remove('hidden');
            tabListUsers.classList.add('active');
            tabUpdateUser.style.display = 'none';
            break;
        case 'add':
            addUser.classList.remove('hidden');
            tabAddUser.classList.add('active');
            break;
        case 'update':
            updateUser.classList.remove('hidden');
            tabUpdateUser.classList.add('active');
            tabUpdateUser.style.display = 'flex';
            break;
    }
}
</script>
@endsection

@section('modal')
{{-- Enhanced Professional Delete Modal --}}
<div class="modal fade" id="deletUserModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">
                    <i class="material-icons">warning</i>
                    Confirm User Deletion
                </h5>
                <button onclick="modalclosebtn()" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="delete-confirmation">
                    <div class="delete-icon">
                        <i class="material-icons">delete_forever</i>
                    </div>
                    <h6 style="color: var(--text-primary); margin-bottom: 1rem; font-size: 1.25rem; font-weight: 600;">
                        Are you sure you want to delete this user?
                    </h6>
                    <p style="color: var(--text-muted); font-size: 1rem; line-height: 1.6;">
                        This action cannot be undone. All user data, including profile information, 
                        activity history, and associated records will be permanently removed from the system.
                    </p>
                    <div style="background: var(--bg-secondary); border-radius: var(--border-radius-sm); padding: 1rem; margin-top: 1.5rem;">
                        <p style="color: var(--text-secondary); font-size: 0.875rem; margin: 0;">
                            <i class="material-icons" style="font-size: 1rem; margin-right: 0.5rem; vertical-align: middle;">info</i>
                            <strong>Note:</strong> Consider deactivating the user account instead of permanent deletion.
                        </p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button onclick="modalclosebtn()" type="button" class="btn-professional btn-secondary" data-dismiss="modal">
                    <i class="material-icons">cancel</i>
                    Cancel
                </button>
                <form action="" id="deletUserForm" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-professional btn-danger">
                        <i class="material-icons">delete</i>
                        Delete User
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
