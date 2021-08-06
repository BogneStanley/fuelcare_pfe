<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProfil;
use App\Http\Controllers\AdminStationController;
use App\Http\Controllers\GerantController;
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
Route::put('admin/profil/{id}',[AdminProfil::class, "update"])->name("admin.profil");
Route::put('admin/stations/{id}', [AdminStationController::class, "update"])->middleware("auth");
Route::get('admin', [AdminController::class, "index"])->name("admin.home")->middleware("auth");
Route::get('admin/stations', [AdminStationController::class, "index"])->name("admin.station")->middleware("auth");
Route::get('admin/stations/{id}', [AdminStationController::class, "store"])->middleware("auth");
Route::post('admin/stations', [AdminStationController::class, "create"])->middleware("auth");
Route::post('admin/stations/{id}', [UserController::class, "create"])->middleware("auth");
Route::get('admin/stations/tache', [TacheController::class, "create"])->name("admin.station.tache");
Route::post('admin/stations/tache/{id}', [TacheController::class, "create"]);
Route::get('admin/profil',[AdminProfil::class, "index"])->name("admin.profil");


// gerant routes
Route::get('gerant', [GerantController::class, "index"])->name("gerant.home")->middleware("auth");



/*
Route::get('/test',function () {
    $user = User::find(4);
    $te = Hash::make("admin");
    $te = Hash::check("admin", $user->password);
    dd($te);


});
Route::get('/user',function () {
    $user = new User();
    $user->email = "admin@admin.test";
    $user->password = Hash::make("admin");
    $user->status = 0;
    $user->firstname = "admin";
    $user->lastname = "admin";
    $user->save();
});
*/
