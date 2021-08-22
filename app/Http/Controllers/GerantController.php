<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GerantController extends Controller
{
    //
    public function index(){
        $page = "home";
        return view("gerant.home", ["page"=>$page]);
    }
}
