<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function index(){
        $page = "home";
        return view("admin.home",["page"=>$page]);
    }
}
