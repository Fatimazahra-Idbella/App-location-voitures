@extends('layouts.body')

@section('Title', 'User Profile')

@section('profile_active')
active bg-gradient-primary 
@endsection

@section('page_name', 'User Profile')

@section('main_content')
<style>
    .profile-container {
        max-width: 900px;
        margin: 80px auto;
    }
    .profile-card {
        border-radius: 1rem;
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        overflow: hidden;
    }
    .profile-header {
        background-color: #003366;
        color: white;
        padding: 2rem;
        text-align: center;
    }
    .profile-header h2 {
        margin: 0;
    }
    .profile-body {
        padding: 2rem;
        
    }
    .form-control:focus {
        border-color: #4db8ff;
        box-shadow: 0 0 0 0.25rem rgba(77, 184, 255, 0.25);
    }
    .btn-custom {
        background-color: #003366;
        color: #fff;
        border: none;
    }
    .btn-custom:hover {
        background-color: #004080;
    }
    .avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid white;
        margin-bottom: 10px;
    }
</style>

<div class="container profile-container">
    <div class="card profile-card">
        <div class="profile-header">
            <img src="{{ Auth::user()->profile_photo ?? asset('assets/img/default-avatar.png') }}" alt="Profile Picture" class="avatar">
            <h2>{{ Auth::user()->username }}</h2>
            <p>{{ Auth::user()->email }}</p>
        </div>

        <div class="profile-body">
            {{-- Update Profile --}}
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Change Username</label>
                    <input type="text" name="username" class="form-control" value="{{ Auth::user()->username }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Change Profile Picture</label>
                    <input type="file" name="profile_photo" class="form-control">
                </div>

                <button type="submit" class="btn btn-custom">Update Profile</button>
            </form>

            <hr class="my-4">

            {{-- Other functionalities --}}
            <h5>Account Options</h5>
            <div class="d-flex flex-wrap gap-3 mt-3">
                <a href="" class="btn btn-outline-secondary">Change Password</a>
                <a href="{{ route('users.vehicles') }}" class="btn btn-outline-info">My Vehicles</a>
                <a href="{{ route('logout') }}" class="btn btn-outline-danger"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                   Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
