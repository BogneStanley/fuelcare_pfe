<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\AdminStationController;
use App\Http\Controllers\CuveController;
use App\Http\Controllers\DepotageController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\GerantController;
use App\Http\Controllers\RapportController;
use App\Http\Controllers\TacheController;
use App\Models\Station;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    try {
        if (Auth::user()->status == 0) {
            return redirect("admin");
        }elseif (Auth::user()->status == 1) {
            return redirect("gerant");
        }elseif (Auth::user()->status == 2) {
            return redirect("employe");
        }
    } catch (\Throwable $th) {
        return redirect("login");
    }

});
// routes for all user
Route::get('/login',[UserController::class, "index"])->name("login")->middleware("guest");
Route::post('/login',[UserController::class, "login"])->name("login")->middleware("guest");
Route::get('/logout',[UserController::class, "logout"])->name("logout")->middleware("auth");


// admin routes
Route::delete('admin/stations/{id}', [AdminStationController::class, "delete"])->middleware("auth");
Route::delete('admin/stations/tache/{id}', [TacheController::class, "delete"])->middleware("auth");
Route::put('admin/stations/user/{id}', [UserController::class, "update"])->middleware("auth");
Route::put('admin/profil/{id}',[ProfilController::class, "update"])->name("admin.profil");
Route::put('admin/stations/{id}', [AdminStationController::class, "update"])->middleware("auth");
Route::get('admin', [AdminController::class, "index"])->name("admin.home")->middleware("auth");
Route::get('admin/stations', [AdminStationController::class, "index"])->name("admin.station")->middleware("auth");
Route::get('admin/stations/{id}', [AdminStationController::class, "store"])->middleware("auth");
Route::post('admin/stations', [AdminStationController::class, "create"])->middleware("auth");
Route::post('admin/stations/{id}', [UserController::class, "create"])->middleware("auth");
Route::get('admin/stations/tache', [TacheController::class, "create"])->name("admin.station.tache");
Route::post('admin/stations/tache/{id}', [TacheController::class, "create"]);
Route::get('admin/profil',[ProfilController::class, "index"])->name("admin.profil");


// gerant routes
Route::delete('gerant/rapports/{id}', [RapportController::class, "delete"])->middleware("auth");
Route::get('gerant/rapports/{id}', [RapportController::class, "download"])->middleware("auth");
Route::post('gerant/employes/{id}', [UserController::class, "create"])->middleware("auth");
Route::get('gerant/employes/{id}', [EmployeController::class, "store"])->middleware("auth");
Route::delete('gerant/depotages/{id}', [DepotageController::class, "delete"])->middleware("auth");
Route::delete('gerant/employes/tache/{id}', [TacheController::class, "delete"])->middleware("auth");
Route::get('gerant/depotages/{id}', [DepotageController::class, "download"])->middleware("auth");
Route::get('gerant', [GerantController::class, "index"])->name("gerant.home")->middleware("auth");
Route::get('gerant/cuves', [CuveController::class, "index"])->name("gerant.cuve")->middleware("auth");
Route::post('gerant/rapports', [RapportController::class, "create"])->middleware("auth");
Route::get('gerant/rapports', [RapportController::class, "index"])->name("gerant.rapports")->middleware("auth");
Route::post('gerant/depotages', [DepotageController::class, "create"])->middleware("auth");
Route::get('gerant/depotages', [DepotageController::class, "index"])->name("gerant.depotages")->middleware("auth");
Route::get('gerant/employes', [EmployeController::class, "index"])->name("gerant.employes")->middleware("auth");
Route::get('gerant/employes/tache', function(){ return back(404); })->name("gerant.employes.tache");
Route::post('gerant/employes/tache/{id}', [TacheController::class, "create"]);
Route::get('gerant/tache', [TacheController::class, "index"])->name("gerant.tache");
Route::put('gerant/tache/{id}', [TacheController::class, "changeState"])->middleware("auth");
Route::get('gerant/profil',[ProfilController::class, "index"])->name("gerant.profil");





/*
Route::get('/test',function () {
    $user = User::find(4);
    $te = Hash::make("admin");
    $te = Hash::check("admin", $user->password);
    dd($te);


});*/

/*
Route::get('/user',function () {
    $user = new User();
    $user->email = "admin@admin.test";
    $user->password = Hash::make("admin");
    $user->status = 0;
    $user->firstname = "Administratreur";
    $user->lastname = "Root";
    $user->save();
});
*/
