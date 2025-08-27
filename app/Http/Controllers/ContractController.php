<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Voiture;
use App\Models\User;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function index()
    {
        $contracts = Contract::with(['client', 'vehicle'])->get();
        
        return view('admin.contracts', compact('contracts'));
    }

    public function create()
    {
        $clients = User::all();
        $vehicles = Voiture::all();
        return view('admin.contracts_create', compact('clients', 'vehicles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required',
            'vehicle_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'price' => 'required|numeric',
        ]);

        Contract::create($request->all());

        return redirect()->route('contracts.index')->with('success', 'Contrat créé avec succès.');
    }
}
