<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminProfil extends Controller
{
    //afficher la page de profil de l'administrateur

    public function index()
    {
        return view("admin.profile");
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

        return back();
    }
}
