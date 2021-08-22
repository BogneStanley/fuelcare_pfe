<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CuveController extends Controller
{
    //
    public function index(){
        $page = "cuve";
        return view("gerant.cuve",["page"=>$page]);
    }
}
