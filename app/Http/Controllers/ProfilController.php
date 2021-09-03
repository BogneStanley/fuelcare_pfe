<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    //afficher la page de profil de l'administrateur

    public function index()
    {
        if (Auth::user()->status == 0) {
            return view("admin.profile");
        }elseif(Auth::user()->status == 1){
            return view("gerant.profile");
        }elseif(Auth::user()->status == 2){
            return view("employe.profile");
        }
    }
    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            "nom"=>"required",
            "prenom"=>"required",
            "password"=>"required|min:8|confirmed",
        ]);

        $user = User::findOrFail($id);
        $user->firstname = $validator["prenom"];
        $user->lastname = $validator["nom"];
        $user->password = Hash::make($validator["password"]) ;
        $user->save();

        return back()->with("success","Votre profil a été mise a jour");
    }
}
