@extends('layouts.body')
@section('Title', 'Edit Vehicle')

@section('main_content')
<div class="container mt-5">
    <form method="POST" action="{{ route('users.update', $car->id) }}">
        @csrf
        @method('PUT')
        <input type="text" name="brand" value="{{ $car->brand }}" required>
        <input type="text" name="model" value="{{ $car->model }}" required>
        <button type="submit">Update Vehicle</button>
    </form>
</div>
@endsection
