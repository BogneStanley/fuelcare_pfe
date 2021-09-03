<?php

namespace App\Http\Controllers;

use App\Models\Station;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminStationController extends Controller
{
    //
    public function index()
    {
        $page = "stations";
        $stations = Station::all();
        return view("admin.station",["stations"=>$stations,"page"=>$page]);
    }

    public function create(Request $request)
    {
        $validator = $request->validate([
            "ville"=>"required",
            "quartier"=>"required",
        ]);

        $station = new Station();
        $station->lieu_station = $validator["ville"]."-".$validator["quartier"];
        $station->save();
        return back()->with("success","La station a bien été créer");
    }

    public function store($id)
    {
        $page = "stations";
        $station = Station::findOrFail($id);
        $users = $station->users()->get();
        $gerant=null;
        foreach ($users as $user) {
            if ($user->status == 1) {
                $gerant = $user;
            }
        }
        return view("admin.station_store",["station"=>$station,"gerant"=>$gerant,"page"=>$page]);

    }

    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            "ville"=>"required",
            "quartier"=>"required",
        ]);

        $station = Station::findOrFail($id);
        $station->lieu_station = $validator["ville"]."-".$validator["quartier"];
        $station->save();
        return back()->with("success","La station a bien été mise a jour");
    }

    public function delete($id)
    {
        $station = Station::find($id);
        $users = $station->users()->get();
        $station->delete();
        foreach($users as $user){
            $user->delete();
        }

        return back()->with("success","La station a bien été supprimer");


    }
}
