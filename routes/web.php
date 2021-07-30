<?php

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
    return view('welcome');
});
Route::get('/login',[UserController::class, "index"])->name("login");
Route::post('/login',[UserController::class, "login"])->name("login");
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

