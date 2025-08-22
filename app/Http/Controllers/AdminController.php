<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function accounting()
    {
        return view('admin.accounting');
    }
    
    public function contracts()
    {
        return view('admin.contracts');
    }
    public function dashboard()
    {
       return view('admin.dashboard');
    }
    public function declaration()
    {
        return view('admin.declaration');
    }
    public function maintenance()
    {
        return view('admin.maintenance');
    }
    public function vehicules()
    {
        return view('admin.vehicules');
    }
    public function notifications()
    {
        return view('admin.notifications');
    }
    public function profile()
    {
        return view('admin.profile');
    }
    public function manageusers()
    {
        $utils = user::where('isAdmin', '!=', true)->get();
        return view('admin.manageusers',['utils' => $utils]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'in:admin,client'],

        ]);

        $user = new user();

        $user->name = $request->name;
        $user->prenom = $request->prenom;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;

        

        $user->save();

        return redirect()->back()->with('success','New user has been added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = user::find($id);
        return response()->json($user);
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
    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'in:admin,client'],
        ]);

        $user = user::find($request->id);

        if ($user->email == $request->email) {
            $user->name = $request->name;
            $user->prenom = $request->prenom;
            $user->username = $request->username;
            $user->password = bcrypt($request->password);
            $user->role = $request->role;
        } else {
            $user->name = $request->name;
            $user->prenom = $request->prenom;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->role = $request->role;
        }
        

        $user->save();

        return redirect()->back()->with('info','The user has been modified successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        user::destroy($id);
        return redirect()->back()->with('warning','The user has been successfully deleted');
    }
}
