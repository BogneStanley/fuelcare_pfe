<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    //
    public function index()
    {
        return view("login");
    }

    public function create(Request $request, $id)
    {
        $validator = $request->validate([
            "nom"=>"required",
            "prenom"=>"required",
            "password"=>"required|min:8|confirmed",
            "email"=>"required|email|unique:users,email",
        ]);

        $user = new User();
        $user->firstname = $validator["prenom"];
        $user->lastname = $validator["nom"];
        $user->email = $validator["email"];
        $user->password = Hash::make($validator["password"]) ;

        if (Auth::user()->status == 0) {
            $user->status = 1;
        }elseif(Auth::user()->status == 1){
            $user->status = 2;
        }

        $user->save();
        DB::table('station_user')->insert([
            "station_id" => $id,
            "user_id" => $user->id,

        ]);
        return back()->with("user_success");



    }

    public function login(Request $request)
    {
        $credentials = $request->only("email","password");
        if (Auth::attempt($credentials)) {
            if (Auth::user()->status == 0) {
                return redirect("admin")->withSusses("ok");
            }
            if (Auth::user()->status == 1) {
                return redirect("gerant")->withSusses("ok");
            }
            if (Auth::user()->status == 2) {
                return redirect("employe")->withSusses("ok");
            }
        }
        return redirect()->route("login");

    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect()->route('login');
    }

    public function update(Request $request,$id)
    {
        $validator = $request->validate([
            "nom"=>"required",
            "prenom"=>"required",
            "password"=>"required|min:8|confirmed",
            "email"=>"required|email|unique:users,email",
        ]);

        $user = User::findOrFail($id);
        $user->firstname = $validator["prenom"];
        $user->lastname = $validator["nom"];
        $user->email = $validator["email"];
        $user->password = Hash::make($validator["password"]) ;
        $user->save();

        return back();
    }
}
