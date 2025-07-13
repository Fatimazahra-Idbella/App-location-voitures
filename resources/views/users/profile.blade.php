@extends('layouts.body')

@section('Title')
    Profile title
@endsection

@section('profile_active')
active bg-gradient-primary 
@endsection

@section('page_name')
    Profile user
@endsection

@section('main_content')
<h1 style="text-align: center;margin-top: 100px">
    Profile 
    <br> 
    @section('main_IsUser')
    You are User
    @show
</h1>
@endsection
