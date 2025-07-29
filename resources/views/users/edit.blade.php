@extends('layouts.body')
@section('Title', 'Edit Vehicle')

@section('main_content')
<style>
    .edit-form-container {
        padding: 3rem 0;
    }

    .form-card {
        border-radius: 12px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        background: #fff;
        overflow: hidden;
    }

    .form-header {
        background-color: #003366;
        color: #fff;
        padding: 1.5rem;
        text-align: center;
        border-bottom: 5px solid #4db8ff;
    }

    .form-header h4 {
        font-weight: bold;
    }

    .form-body {
        padding: 2rem;
    }

    .form-group label {
        font-weight: 600;
        color: #003366;
    }

    .form-control {
        border-radius: 8px;
        background: #f2f6fa;
        border: 1px solid #ccc;
    }

    .submit-btn {
        background: #003366;
        color: #fff;
        padding: 0.75rem 2rem;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        text-transform: uppercase;
        width: 100%;
        transition: 0.3s ease;
    }

    .submit-btn:hover {
        background-color: #004080;
        transform: scale(1.02);
    }
</style>

<div class="container edit-form-container">
    <div class="form-card">
        <div class="form-header">
            <h4>Edit Vehicle {{ $car->marque }}</h4>
            <p class="mb-0">Modify vehicle details below</p>
        </div>
        <div class="form-body">
            <form method="POST" action="{{ route('users.update', $car->id) }}">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="marque">Brand</label>
                        <input type="text" name="marque" class="form-control" value="{{ $car->marque }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="model">Model</label>
                        <input type="text" name="model" class="form-control" value="{{ $car->model }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="matriculG">Plate G</label>
                        <input type="text" name="matriculG" class="form-control" value="{{ $car->matriculG }}" required>
                    </div>
                    <div class="col-md-4">
                        <label for="matriculL">Plate L</label>
                        <input type="text" name="matriculL" class="form-control" value="{{ $car->matriculL }}" required>
                    </div>
                    <div class="col-md-4">
                        <label for="matriculS">Plate S</label>
                        <input type="text" name="matriculS" class="form-control" value="{{ $car->matriculS }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="compteur">Odometer Reading</label>
                        <input type="number" name="compteur" class="form-control" value="{{ $car->compteur }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="d_compteur">Odometer Date</label>
                        <input type="date" name="d_compteur" class="form-control" value="{{ $car->d_compteur }}" required>
                    </div>
                </div>

                <button type="submit" class="submit-btn">Update Vehicle</button>
            </form>
        </div>
    </div>
</div>
@endsection
