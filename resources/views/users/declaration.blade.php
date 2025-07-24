@extends('layouts.body')

@section('Title')
    Declaration
@endsection

@section('declaration_active')
    active bg-gradient-primary 
@endsection

@section('page_name')
    Declaration
@endsection

@section('head')
<style>
    .declaration-container {
        padding: 2rem;
    }

    .declaration-card {
        border-radius: 12px;
        box-shadow: 0 6px 12px rgba(0,0,0,0.08);
        padding: 2rem;
        transition: 0.3s ease;
    }

    .declaration-card:hover {
        transform: translateY(-4px);
    }

    .declaration-title {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 1.5rem;
        color: #000 !important;
    }

    .declaration-form label {
        font-weight: 500;
        margin-top: 1rem;
    }

    .declaration-form textarea,
    .declaration-form select,
    .declaration-form input {
        border-radius: 8px;
        padding: 0.75rem;
        width: 100%;
        border: 1px solid #d1d5db;
        margin-top: 0.5rem;
    }

    .declaration-form button {
        background: #2563eb;
        color: white;
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        margin-top: 1.5rem;
        transition: 0.3s ease;
    }

    .declaration-form button:hover {
        background: #1e40af;
    }

    /* Dark mode adaptation */
    [data-theme="dark"] .declaration-card {
        background: #1e293b;
        color: #f1f5f9;
    }

    [data-theme="dark"] .declaration-form input,
    [data-theme="dark"] .declaration-form textarea,
    [data-theme="dark"] .declaration-form select {
        background-color: #334155;
        color: #f8fafc;
        border: 1px solid #475569;
    }
</style>
@endsection

@section('main_content')
<div class="container declaration-container">
    <div class="declaration-card">
        <div class="declaration-title">
            Submit a Declaration
        </div>

        <form method="POST"  class="declaration-form">
            @csrf

            <label for="subject">Subject</label>
            <input type="text" name="subject" id="subject" required placeholder="Declaration subject">

            <label for="type">Type of Declaration</label>
            <select name="type" id="type" required>
                <option value="">-- Select Type --</option>
                <option value="damage">Damage</option>
                <option value="accident">Accident</option>
                <option value="loss">Loss</option>
                <option value="other">Other</option>
            </select>

            <label for="details">Details</label>
            <textarea name="details" id="details" rows="5" required placeholder="Write your declaration here..."></textarea>

            <button type="submit">Submit Declaration</button>
        </form>
    </div>
</div>
@endsection
