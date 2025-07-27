<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\repair;
use App\Models\Voiture;
use App\Models\intervalle;
use App\Models\papier;
use App\Models\assurance;
use App\Models\visite;
use App\Models\circulation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\DB;


class VoitureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $cars = Voiture::where('isAdmin', '!=', true)->get();
        // return view('admin.vehicules',['cars' => $cars]);
        // $cars = DB::select('select * from Voitures');
        $assurances = DB::table('papiers')->orderBy('updated_at', 'desc')->where('assurance', '!=', '1000-01-01')->get();
        $visites = DB::table('papiers')->orderBy('updated_at', 'desc')->where('visite', '!=', '1000-01-01')->get();
        $circulations = DB::table('papiers')->orderBy('updated_at', 'desc')->where('circulation', '!=', '1000-01-01')->get();

        $voittures = DB::table('Voitures')
        ->orderBy('marque', 'ASC')
        ->orderBy('model', 'ASC')
        ->get();
        $cars = DB::table('Voitures')
        ->orderByRaw('CONVERT(matriculS, SIGNED) ASC')
        ->orderBy('matriculL', 'ASC')
        ->orderByRaw('CONVERT(matriculG, SIGNED) ASC')
        ->leftJoin('assurances', function ($join) {
            $join->on('Voitures.id', '=', 'assurances.assurance_id')
                ->whereRaw('assurances.updated_at = (
                    SELECT MAX(updated_at)
                    FROM assurances
                    WHERE assurance_id = Voitures.id
                )');
        })
        ->leftJoin('visites', function ($join) {
            $join->on('Voitures.id', '=', 'visites.visite_id')
                ->whereRaw('visites.updated_at = (
                    SELECT MAX(updated_at)
                    FROM visites
                    WHERE visite_id = Voitures.id
                )');
        })
        ->leftJoin('circulations', function ($join) {
            $join->on('Voitures.id', '=', 'circulations.circulation_id')
                ->whereRaw('circulations.updated_at = (
                    SELECT MAX(updated_at)
                    FROM circulations
                    WHERE circulation_id = Voitures.id
                )');
        })
        ->leftJoin('intervalles', 'Voitures.id', '=', 'intervalles.intervalle_id')
        ->select('Voitures.*', 'assurances.assurance', 'visites.visite', 'circulations.circulation', 'intervalles.intervalle_assurance', 'intervalles.intervalle_visit', 'intervalles.intervalle_circulation')
        ->get();

        

        return view('admin.vehicules')->with(['cars'=>$cars,'voittures'=>$voittures,'assurances'=>$assurances,'visites'=>$visites,'circulations'=>$circulations]);
        return view('user.vehicules')->with(['cars'=>$cars,'voittures'=>$voittures,'assurances'=>$assurances,'visites'=>$visites,'circulations'=>$circulations]);

    }
    
    public function indexdashboard()
    {
        $cars = DB::select('select * from Voitures');
        return view('admin.dashboard',['cars'=>$cars]);
        return view('user.dashboard',['cars'=>$cars]);
    }

    public function indexmaint()
    {
        $plaquettes = DB::table('repairs')->orderBy('created_at', 'desc')->where('plaquette', '!=', 0)->get();

        $croixChaines = DB::table('repairs')->orderBy('created_at', 'desc')->where('croix_chaine', '!=', 0)->get();

        $cars = DB::table('Voitures')
        ->leftJoin('repairs', function ($join) {
            $join->on('Voitures.id', '=', 'repairs.car_id')
                ->whereRaw('repairs.created_at = (
                    SELECT MAX(created_at)
                    FROM repairs
                    WHERE car_id = Voitures.id
                    AND repairs.videnge != 0
                )');
        })
        ->leftJoin('intervalles', 'Voitures.id', '=', 'intervalles.intervalle_id')
        ->select('Voitures.*','repairs.car_id', 'repairs.videnge', 'repairs.d_videnge', 'repairs.plaquette', 'repairs.croix_chaine', 'repairs.updated_at', 'intervalles.intervalle_videnge', 'intervalles.intervalle_plaquette', 'intervalles.intervalle_croix')
        ->get();
        
    
        return view('admin.maintenance')->with(['cars'=>$cars,'plaquettes'=>$plaquettes,'croixChaines'=>$croixChaines]);
    }
    public function indexhome()
    {
        $cars = DB::select('select * from Voitures');
        return view('/home',['cars'=>$cars]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.

   */
public function store(Request $request)
{
    $request->validate([
        'brand' => 'required|string|max:255',
        'model' => 'required|string|max:255',
        'plateG' => 'required|string|max:255',
        'plateL' => 'required|string|max:255',
        'plateS' => 'required|string|max:255',
        'mileage' => 'required|numeric',
        'mileage_date' => 'required|date',
    ]);

    \App\Models\Voiture::create([
        'marque' => $request->brand,
        'model' => $request->model,
        'matriculG' => $request->plateG,
        'matriculL' => $request->plateL,
        'matriculS' => $request->plateS,
        'compteur' => $request->mileage,
        'd_compteur' => $request->mileage_date,
    ]);

   return redirect()->route('users.vehicles')->with('success', 'Vehicle added successfully.');


}


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $car = Voiture::leftJoin('intervalles', 'Voitures.id', '=', 'intervalles.intervalle_id' )
        ->leftJoin('assurances', 'Voitures.id', '=', 'assurances.assurance_id')
        ->leftJoin('visites', 'Voitures.id', '=', 'visites.visite_id')
        ->leftJoin('circulations', 'Voitures.id', '=', 'circulations.circulation_id')
        ->select('Voitures.*', 'assurances.assurance', 'visites.visite', 'circulations.circulation', 'intervalles.intervalle_assurance', 'intervalles.intervalle_visit', 'intervalles.intervalle_circulation', 'intervalles.intervalle_videnge', 'intervalles.intervalle_plaquette', 'intervalles.intervalle_croix')
        ->where('Voitures.id', $id)
        ->first();
        // $car = Voiture::find($id);
        return response()->json($car);
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'marquecar' => ['required', 'string', 'max:255'],
            'modelcar' => ['required', 'string', 'max:255'],
            'matriculeG' => ['required', 'string', 'max:255'],
            'MatriculeL' => ['required', 'string', 'max:255',],
            'matriculeS' => ['required', 'string', 'max:255'],
            'assurancecar' => ['string', 'max:255'],
            'visitetechnique' => ['string', 'max:255'],
            'Compteurcar' => ['string', 'max:255'],
            'd_Compteurcar' => ['string', 'max:255'],
        ]);

        $car = Voiture::find($id);
        $car->marque = $request->marquecar;
        $car->model = $request->modelcar;
        $car->matriculG = $request->matriculeG;
        $car->matriculL = $request->MatriculeL;
        $car->matriculS = $request->matriculeS;
        $car->compteur = $request->Compteurcar;
        $car->d_compteur = $request->d_Compteurcar;
        $car->save();

        $assur = assurance::where('assurance_id', $id)->first();
        $assur->assurance = $request->assurancecar;
        $assur->save();

        $visit = visite::where('visite_id', $id)->first();
        $visit->visite = $request->visitetechnique;
        $visit->save();

        $circul = circulation::where('circulation_id', $id)->first();
        $circul->circulation = $request->auto_cercu;
        $circul->save();

        $intrvl = intervalle::where('intervalle_id', $id)->first();
        $intrvl->intervalle_assurance = $request->inter_assurance;
        $intrvl->intervalle_visit = $request->inter_visite;
        $intrvl->intervalle_circulation = $request->inter_cercu;
        $intrvl->save();

        return redirect()->back()->with('info','The user has been modified successfully');
    }
    public function updatecar(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Voiture::destroy($id);
        return redirect()->back()->with('warning','The user has been successfully deleted');
    }
    
    public function storeincar(Request $request)
    {
        $request->validate([
            'assurance' => [ 'string', 'max:255','nullable'],
            'visite' => ['string', 'max:255','nullable'],
            'circulation' => ['string', 'max:255','nullable'],
        ]);


        if ($request->assurancecar != '') {
            $assur = new assurance();
            $assur->assurance = $request->assurancecar;
            $assur->assurance_id = $request->id;
            $assur->save();
        }
        if ($request->visitetechnique != '') {
            $visit = new visite();
            $visit->visite = $request->visitetechnique;
            $visit->visite_id = $request->id;
            $visit->save();
        }
        if ($request->auto_cercu != '') {
            $circul = new circulation();
            $circul->circulation = $request->auto_cercu;
            $circul->circulation_id = $request->id;
            $circul->save();
        }

        return redirect()->back()->with('success','New user has been added successfully');
    }
}

