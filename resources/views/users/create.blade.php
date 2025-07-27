@extends('layouts.body')

@section('Title', 'Add New Vehicle')

@section('main_content')
<style>
    .vehicle-form-container {
        min-height: 100vh;
        padding: 3rem 0;
    }

    .form-card {
        border-radius: 12px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .form-header {
        background: #003366;
        color: #fff;
        padding: 2rem;
        text-align: center;
        border-bottom: 5px solid #4db8ff;
    }

    .form-header h4 {
        color: #fff;
        font-size: 2rem;
        font-weight: 700;
        margin: 0;
    }

    .form-header .subtitle {
        font-size: 1rem;
        opacity: 0.85;
        margin-top: 0.5rem;
    }

    .form-body {
        padding: 2.5rem;
    }

    .form-section {
        margin-bottom: 2rem;
        border-left: 4px solid #4db8ff;
        padding-left: 1rem;
    }

    .section-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: #333;
        margin-bottom: 1rem;
    }

    .form-group label {
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: #003366;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .form-control {
        border-radius: 8px;
        border: 1px solid rgb(159, 160, 160);
        background: rgb(215, 220, 226);
        padding: 0.75rem 1rem;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #4db8ff;
        box-shadow: 0 0 0 0.25rem rgba(77, 184, 255, 0.25);
    }

    .license-plate-group,
    .mileage-group {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
        gap: 1rem;
    }

    .submit-btn {
        background: #003366;
        color: white;
        border: none;
        padding: 0.75rem 2rem;
        border-radius: 8px;
        font-weight: 600;
        text-transform: uppercase;
        transition: all 0.3s ease;
        width: 100%;
    }

    .submit-btn:hover {
        background: #004080;
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    @media (max-width: 768px) {
        .form-body {
            padding: 1.5rem;
        }
    }
</style>

<div class="vehicle-form-container">
    <div class="container">
        <div class="form-card">
            <div class="form-header">
                <h4>Add a New Vehicle</h4>
                <p class="subtitle">Vehicle Rental Management System</p>
            </div>
            <div class="form-body">
                <form method="POST" action="{{ route('users.store') }}">
                    @csrf

                    {{-- Vehicle Info --}}
                    <div class="form-section">
                        <h5 class="section-title">Vehicle Information</h5>

                        <div class="form-group">
                            <label for="brand">Brand</label>
                            <input type="text" class="form-control" id="brand" name="brand" placeholder="e.g., Toyota, BMW, Mercedes" required>
                        </div>

                        <div class="form-group">
                            <label for="model">Model</label>
                            <input type="text" class="form-control" id="model" name="model" placeholder="e.g., Corolla, X3, A-Class" required>
                        </div>
                    </div>

                    {{-- License Plate --}}
                    <div class="form-section">
                        <h5 class="section-title">License Plate</h5>

                        <div class="license-plate-group">
                            <div class="form-group">
                                <label for="plateG">Series G</label>
                                <input type="text" class="form-control" id="plateG" name="plateG" maxlength="5" placeholder="e.g., 12345" required>
                            </div>
                            <div class="form-group">
                                <label for="plateL">Letters</label>
                                <input type="text" class="form-control" id="plateL" name="plateL" maxlength="3" placeholder="e.g., ABC" style="text-transform: uppercase;" required>
                            </div>
                            <div class="form-group">
                                <label for="plateS">Series S</label>
                                <input type="text" class="form-control" id="plateS" name="plateS" maxlength="2" placeholder="e.g., 12" required>
                            </div>
                        </div>
                    </div>

                    {{-- Status & Registration --}}
                    <div class="form-section">
                        <h5 class="section-title">Status & Registration</h5>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="Available">Available</option>
                                <option value="Rented">Rented</option>
                                <option value="Maintenance">Maintenance</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="registration_date">Registration Date</label>
                            <input type="date" class="form-control" id="registration_date" name="registration_date" readonly>
                        </div>
                    </div>

                    {{-- Mileage --}}
                    <div class="form-section">
                        <h5 class="section-title">Mileage</h5>

                        <div class="mileage-group">
                            <div class="form-group">
                                <label for="mileage">Mileage (km)</label>
                                <input type="number" class="form-control" id="mileage" name="mileage" min="0" placeholder="e.g., 45000" required>
                            </div>
                            <div class="form-group">
                                <label for="mileage_date">Mileage Date</label>
                                <input type="date" class="form-control" id="mileage_date" name="mileage_date" required>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="submit-btn">Add Vehicle</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Uppercase letters in license
    document.getElementById('plateL').addEventListener('input', function (e) {
        e.target.value = e.target.value.toUpperCase();
    });

    // Set default dates
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('mileage_date').value = today;
    document.getElementById('registration_date').value = today;

    // Disable submit after click
    document.querySelector('form').addEventListener('submit', function (e) {
        const btn = document.querySelector('.submit-btn');
        btn.innerHTML = 'Adding...';
        btn.disabled = true;
    });
</script>
@endsection
