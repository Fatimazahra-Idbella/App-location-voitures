<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Voiture;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function accounting()
    {
        return view('users.accounting');
    }
    
    public function contracts()
    {
        return view('users.contracts');
    }
    public function dashboard()
    {
        // Récupère toutes les voitures (ou avec une condition selon ton besoin)
        $cars = Voiture::all();

        // Envoie la variable $cars à la vue
        return view('users.dashboard', compact('cars'));
    }
    public function declaration()
    {
        return view('users.declaration');
    }
    public function maintenance()
    {
        return view('users.maintenance');
    }
    public function vehicules()
    {
        return view('users.vehicules');
    }
    public function notifications()
    {
        return view('users.notifications');
    }
    

// insert data in data base


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('users.dashboard');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function profile()
{
    return view('users.profile');
}



}
