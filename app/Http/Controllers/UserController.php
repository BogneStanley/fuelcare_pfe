<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index()
    {
        return view("login");
    }

    public function login(Request $request)
    {
        $credentials = $request->only("email","password");
        if (Auth::attempt($credentials)) {
            return redirect("test")->withSusses("ok ok");
        }

    }
}
