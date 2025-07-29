<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\RepairController;
use App\Http\Controllers\VoitureController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [VoitureController::class, 'indexhome'])->name('home');

Route::group(['prefix' => 'user','as' => 'user.', 'middleware' => ['auth','IsUser']],function(){
    Route::get('accounting', [UserController::class, 'accounting'])->name('accounting');
    Route::get('contracts', [UserController::class, 'contracts'])->name('contracts');
    Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('declaration', [UserController::class, 'declaration'])->name('declaration');
    Route::get('maintenance', [UserController::class, 'maintenance'])->name('maintenance');
    Route::get('vehicules', [UserController::class, 'vehicules'])->name('vehicules');
    Route::get('notifications', [UserController::class, 'notifications'])->name('notifications');
    Route::get('profile', [UserController::class, 'profile'])->name('profile');
    Route::resource('car', VoitureController::class);
    Route::get('vehicules', [VoitureController::class, 'index'])->name('vehicules');
    Route::get('maintenance', [VoitureController::class, 'indexmaint'])->name('maintenance');
    Route::get('dashboard', [VoitureController::class, 'indexdashboard'])->name('dashboard');

});


Route::group(['prefix' => 'admin','as' => 'admin.','middleware' => ['auth','IsAdmin']],function(){
    Route::get('accounting', [AdminController::class, 'accounting'])->name('accounting');
    Route::get('contracts', [AdminController::class, 'contracts'])->name('contracts');
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('declaration', [AdminController::class, 'declaration'])->name('declaration');
    Route::get('maintenance', [AdminController::class, 'maintenance'])->name('maintenance');
    Route::get('vehicules', [AdminController::class, 'vehicules'])->name('vehicules');
    Route::get('notifications', [AdminController::class, 'notifications'])->name('notifications');
    Route::get('profile', [AdminController::class, 'profile'])->name('profile');
    Route::get('manageusers', [AdminController::class, 'manageusers'])->name('manageusers');
    Route::post('store', [AdminController::class, 'store'])->name('store');
    Route::put('update', [AdminController::class, 'update'])->name('update');
    Route::resource('admin', AdminController::class);
    Route::resource('car', VoitureController::class);
    Route::put('updatecar', [VoitureController::class, 'updatecar'])->name('updatecar');
    Route::get('vehicules', [VoitureController::class, 'index'])->name('vehicules');
    Route::get('maintenance', [VoitureController::class, 'indexmaint'])->name('maintenance');
    Route::get('dashboard', [VoitureController::class, 'indexdashboard'])->name('dashboard');
    Route::post('vehicules', [VoitureController::class, 'storeincar'])->name('storeincar');
    Route::resource('repair', RepairController::class);
    // Route::get('maintenance', [RepairController::class, 'indexrepair'])->name('indexrepair');
    Route::post('addvidenge', [RepairController::class, 'addvidenge'])->name('addvidenge');
    Route::post('addplaquette', [RepairController::class, 'addplaquette'])->name('addplaquette');
    Route::post('addOderRepair', [RepairController::class, 'addOderRepair'])->name('addOderRepair');
    Route::get('showplaquette/{repair}', [RepairController::class, 'showplaquette'])->name('showplaquette');
    Route::get('showOder/{repair}', [RepairController::class, 'showOder'])->name('showOder');
    Route::put('updateinterval/{id}', [RepairController::class, 'updateinterval'])->name('updateinterval');
    Route::put('updatevidenge/{repair}', [RepairController::class, 'updatevidenge'])->name('updatevidenge');
    Route::put('updateplaquette/{repair}', [RepairController::class, 'updateplaquette'])->name('updateplaquette');
    Route::put('updateoder/{repair}', [RepairController::class, 'updateoder'])->name('updateoder');
    Route::delete('deleteplaq/{repair}', [RepairController::class, 'destroyPlaquette'])->name('destroyPlaquette');
});



// Route::group(['middleware' => ['auth','Is%Admin']],function(){
//     Route::get('admin/vehicules', [VoitureController::class, 'indexttable'])->name('indexttable');
// });

Route::fallback(function(){
    return view ('page404');
});

Route::get('/vehicles/dashboard', [VoitureController::class, 'indexdashboard'])->name('vehicles.dashboard');

Route::get('/redirect-by-role', function () {
    $user = Auth::user();

    if ($user->role === 'admin') {
        return redirect('/vehicles/dashboard'); // ou route('admin.dashboard')
    } elseif ($user->role === 'client') {
        return redirect('/home'); // ou route('user.dashboard')
    } else {
        return redirect('/welcome'); // ou page d’accueil par défaut
    }
})->middleware(['auth']);


// Afficher le formulaire
Route::get('/user/create', [VoitureController::class, 'create'])->name('users.create');

// Enregistrer le véhicule
Route::post('/user/store', [VoitureController::class, 'store'])->name('users.store');

Route::get('/user/vehicles', [VoitureController::class, 'index'])->name('users.vehicles');

// Afficher formulaire de modification et supprision
// web.php
Route::get('/user/{id}/edit', [VoitureController::class, 'edit'])->name('users.edit');
Route::put('/user/{id}', [VoitureController::class, 'update'])->name('users.update');
Route::delete('/user/{id}', [VoitureController::class, 'destroy'])->name('users.destroy');
Route::get('/user/vehicles', [VoitureController::class, 'index'])->name('users.vehicles');




