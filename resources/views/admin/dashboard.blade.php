@extends('layouts.body')

@section('Title', 'Admin Dashboard')

@section('page_name')
    <i class="fas fa-crown"></i> Admin Dashboard
@endsection

@section('main_content')
<div class="container-fluid py-4">
    <div class="row">
        <!-- Vehicles -->
        <div class="col-xl-3 col-sm-6 mb-4">
            <div class="card shadow border-0 rounded-3">
                <div class="card-body text-center">
                    <div class="icon bg-primary text-white rounded-circle mb-3 p-3">
                        <i class="fas fa-car"></i>
                    </div>
                    <h5 class="card-title">Vehicles</h5>
                    <p class="card-text">Manage fleet of cars</p>
                    <a href="{{ route('admin.vehicles') }}" class="btn btn-sm btn-primary">Go</a>
                </div>
            </div>
        </div>

        <!-- Users -->
        <div class="col-xl-3 col-sm-6 mb-4">
            <div class="card shadow border-0 rounded-3">
                <div class="card-body text-center">
                    <div class="icon bg-success text-white rounded-circle mb-3 p-3">
                        <i class="fas fa-users"></i>
                    </div>
                    <h5 class="card-title">Users</h5>
                    <p class="card-text">Manage clients & admins</p>
                    <a href="{{ route('user.dashboard') }}" class="btn btn-sm btn-success">Go</a>
                </div>
            </div>
        </div>

        <!-- Reservations -->
        <div class="col-xl-3 col-sm-6 mb-4">
            <div class="card shadow border-0 rounded-3">
                <div class="card-body text-center">
                    <div class="icon bg-warning text-white rounded-circle mb-3 p-3">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <h5 class="card-title">Reservations</h5>
                    <p class="card-text">Track all reservations</p>
                    <a href="{{ route('admin.manageusers') }}" class="btn btn-sm btn-warning text-white">Go</a>
                </div>
            </div>
        </div>

        <!-- Reports -->
        <div class="col-xl-3 col-sm-6 mb-4">
            <div class="card shadow border-0 rounded-3">
                <div class="card-body text-center">
                    <div class="icon bg-danger text-white rounded-circle mb-3 p-3">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h5 class="card-title">Reports</h5>
                    <p class="card-text">View analytics & reports</p>
                    <a href="{{ route('admin.declaration') }}" class="btn btn-sm btn-danger">Go</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="row mt-5">
        <div class="col-md-6">
            <div class="card shadow border-0">
                <div class="card-header bg-primary text-white">
                    <i class="fas fa-car"></i> Vehicle Status
                </div>
                <div class="card-body">
                    <p><strong>Total Vehicles:</strong> {{ $stats['vehicles'] ?? 0 }}</p>
                    <p><strong>Available:</strong> {{ $stats['available'] ?? 0 }}</p>
                    <p><strong>Rented:</strong> {{ $stats['rented'] ?? 0 }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow border-0">
                <div class="card-header bg-success text-white">
                    <i class="fas fa-users"></i> User Statistics
                </div>
                <div class="card-body">
                    <p><strong>Total Users:</strong> {{ $stats['users'] ?? 0 }}</p>
                    <p><strong>Clients:</strong> {{ $stats['clients'] ?? 0 }}</p>
                    <p><strong>Admins:</strong> {{ $stats['admins'] ?? 0 }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

