<?php

namespace App\Http\Controllers;

use App\Models\repair;
use App\Models\Voiture;
use App\Models\intervalle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RepairController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $repairs = DB::table('repairs')->latest('updated_at')->first();
        return view('admin.maintenance',['repairs'=>$repairs]);
        return view('user.maintenance',['repairs'=>$repairs]);
    }
    public function indexrepair()
    {
        // $repairs = DB::table('repairs')->latest('updated_at')->first();
        // return view('admin.maintenance',['repairs'=>$repairs]);
        // return view('user.maintenance',['repairs'=>$repairs]);
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
    public function show($id)
    {
        $repair = DB::table('repairs')
        ->orderBy('created_at', 'desc')
        ->where('repairs.car_id', $id)
        ->where('repairs.videnge','!=', '0')
        ->first();

        return response()->json($repair);

        $ShowPlaquette = DB::table('repairs')
        ->orderBy('created_at', 'desc')
        ->where('repairs.car_id', $id)
        ->where('repairs.plaquette', '<>', 0)
        ->first();
        
        return response()->json($ShowPlaquette);
    }

    public function showplaquette($id)
    {
        $ShowPlaquette = DB::table('repairs')
        ->select('repairs.autre_repair','repairs.plaquette', 'repairs.car_id', 'repairs.id', 'repairs.d_videnge', 'repairs.updated_at')
        ->orderBy('created_at', 'desc')
        ->where('repairs.car_id', $id)
        ->where('repairs.plaquette','!=', '0')
        ->first();
        
        return response()->json($ShowPlaquette);
    }

    public function showOder($id)
    {
        $showOder = DB::table('repairs')
        ->select('repairs.autre_repair', 'repairs.car_id', 'repairs.id', 'repairs.d_videnge', 'repairs.updated_at')
        ->orderBy('created_at', 'desc')
        ->where('repairs.car_id', $id)
        ->where('repairs.autre_repair','!=', 'change Plaquettes avant et arrere')
        ->where('repairs.autre_repair','!=', 'change Plaquettes arrere')
        ->where('repairs.autre_repair','!=', '0')
        ->first();
        
        return response()->json($showOder);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(repair $repair)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'Compteurcar' => ['string', 'max:255'],
            'd_Compteurcar' => ['string', 'max:255'],
        ]);

        $car = Voiture::find($id);

        $car->compteur = $request->Compteurcar;
        $car->d_compteur = $request->d_Compteurcar;

        $car->save();

        return redirect()->back()->with('info','The user has been modified successfully');
    }

    public function updateinterval(Request $request, $id)
    {
        $request->validate([
            'InterVidenge' => ['required', 'string', 'max:255'],
            'InterPlaquette' => ['required', 'string', 'max:255'],
            'InterCroix' => ['required', 'string', 'max:255'],
        ]);
        $uprepair = intervalle::find($id);
        $uprepair->intervalle_videnge = $request->InterVidenge;
        $uprepair->intervalle_plaquette = $request->InterPlaquette;
        $uprepair->intervalle_croix = $request->InterCroix;
        $uprepair->save();

        return redirect()->back()->with('info','The user has been modified successfully');
    }

    public function updatevidenge(Request $request, $id)
    {
        $request->validate([
            'videngerepairUpdate' => ['required', 'string', 'max:255'],
            'dt_videngerepairUpdate' => ['required', 'date', 'max:255'],
        ]);
        $upvid = repair::find($id);
        $upvid->videnge = $request->videngerepairUpdate;
        $upvid->d_videnge = $request->dt_videngerepairUpdate;
        $upvid->isfilterair = $request->chk_FilterairUP;
        $upvid->isfilteroil = $request->chk_FilteroilUP;
        $upvid->isfiltergasoil = $request->chk_FiltergasoilUP;
        if ($request->chk_plaquetteUP != '0'){
            $upvid->plaquette = $request->videngerepairUpdate;
        } else {
            $upvid->plaquette = $request->chk_plaquetteUP;
        }
        if ($request->chk_croix_chaineUP != '0'){
            $upvid->croix_chaine = $request->videngerepairUpdate;
        } else {
            $upvid->croix_chaine = $request->chk_croix_chaineUP;
        }
        $upvid->save();

        return redirect()->back()->with('info','The user has been modified successfully');
    }

    public function updateplaquette(Request $request, $id)
    {
        $request->validate([
            'PlaquetterepairUP' => ['required', 'string', 'max:255'],
            'dt_PlaquetterepairUP' => ['required', 'date', 'max:255'],
        ]);
        $uprepair = repair::find($id);
        $uprepair->d_videnge = $request->dt_PlaquetterepairUP;
        if ($request->chk_PlaquetteAR_UP == '1' && $request->chk_PlaquetteAV_UP == '1') {
            $uprepair->plaquette = $request->PlaquetterepairUP;
            $uprepair->autre_repair = 'change Plaquettes avant et arrere';
        } elseif ($request->chk_PlaquetteAR_UP == '1' && $request->chk_PlaquetteAV_UP == '0') {
            $uprepair->plaquette = '0';
            $uprepair->autre_repair = 'change Plaquettes arrere';
        } else {
            $uprepair->plaquette = $request->PlaquetterepairUP;
            $uprepair->autre_repair = '0';
        }
        $uprepair->save();

        return redirect()->back()->with('info','The user has been modified successfully');
    }

    public function updateoder(Request $request, $id)
    {
        $request->validate([
            'TextRepair_UP' => ['required', 'string', 'max:255'],
            'dt_Repair_UP' => ['required', 'string', 'max:255'],
        ]);
        $uprepair = repair::find($id);
        $uprepair->autre_repair = $request->TextRepair_UP;
        $uprepair->d_videnge = $request->dt_Repair_UP;
        $uprepair->save();

        return redirect()->back()->with('info','The user has been modified successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        repair::destroy($id);
        return redirect()->back()->with('warning','The user has been successfully deleted');
    }

    public function destroyPlaquette($id)
    {
        repair::destroy($id);
        return redirect()->back()->with('warning','The user has been successfully deleted');
    }

    public function addvidenge(Request $request)
    {
        $request->validate([
            'videngerepair' => ['required', 'string', 'max:255'],
            'dt_videngerepair' => ['required', 'date', 'max:255'],
        ]);

        $car = new repair();

        $car->videnge = $request->videngerepair;
        $car->d_videnge = $request->dt_videngerepair;
        if ($request->chk_plaquette != '0'){
            $car->plaquette = $request->videngerepair;
        } else {
            $car->plaquette = $request->chk_plaquette;
        }
        $car->croix_chaine = $request->chk_croix_chaine;
        $car->isfilteroil = $request->chk_Filteroil;
        $car->isfilterair = $request->chk_Filterair;
        $car->isfiltergasoil = $request->chk_Filtergasoil;
        $car->autre_repair = $request->autre_repair;
        $car->car_id = $request->id;


        $car->save();

        return redirect()->back()->with('success','New user has been added successfully');
    }
    public function addplaquette(Request $request)
    {
        $request->validate([
            'Plaquetterepair' => ['required', 'string', 'max:255'],
            'dt_Plaquetterepair' => ['required', 'date', 'max:255'],
        ]);

        $car = new repair();

        $car->videnge = '0';
        $car->d_videnge = $request->dt_Plaquetterepair;
        $car->croix_chaine = '0';
        $car->isfilteroil = '0';
        $car->isfilterair = '0';
        $car->isfiltergasoil = '0';
        if ($request->chk_PlaquetteAR == '1' && $request->chk_PlaquetteAV == '1') {
            $car->plaquette = $request->Plaquetterepair;
            $car->autre_repair = 'change Plaquettes avant et arrere';
        } elseif ($request->chk_PlaquetteAR == '1' && $request->chk_PlaquetteAV == '0') {
            $car->plaquette = '0';
            $car->autre_repair = 'change Plaquettes arrere';
        } else {
            $car->plaquette = $request->Plaquetterepair;
            $car->autre_repair = '0';
        }
        $car->car_id = $request->id;


        $car->save();

        return redirect()->back()->with('success','New user has been added successfully');
    }
    public function addOderRepair(Request $request)
    {
        $request->validate([
            'TextRepair' => ['required', 'string', 'max:255'],
            'dt_Repair' => ['required', 'date', 'max:255'],
        ]);

        $car = new repair();

        $car->videnge = '0';
        $car->d_videnge = $request->dt_Repair;
        $car->plaquette = '0';
        $car->croix_chaine = '0';
        $car->isfilteroil = '0';
        $car->isfilterair = '0';
        $car->isfiltergasoil = '0';
        $car->autre_repair = $request->TextRepair;
        $car->car_id = $request->id;


        $car->save();

        return redirect()->back()->with('success','New user has been added successfully');
    }
}

