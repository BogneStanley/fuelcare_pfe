<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CuveController extends Controller
{
    //
    public function index(){
        return view("gerant.cuve");
    }
}
