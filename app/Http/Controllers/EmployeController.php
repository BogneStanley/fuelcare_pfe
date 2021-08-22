<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Failed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeController extends Controller
{
    //

    public function index()
    {
        $page = "employe" ;
        $employes = Auth::user()->stations[0]->users->where("status",2);
        return view("gerant.employe",["employes"=>$employes,"page"=>$page]);
    }

    public function store($id)
    {
        $page = "employe" ;
        $user = User::findOrFail($id);
        if ($user->status == 0) {
            return abort(404);
        }
        return view("gerant.employeStore",['user'=>$user,"page"=>$page]);
    }


}
