<?php

namespace App\Http\Controllers;

use App\Models\Depotage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DepotageController extends Controller
{
    //
    public function index()
    {
        $page = "depotages";
        $depotages = Auth::user()->depotages;
        return view("gerant.depotages", ["depotages"=>$depotages,"page"=>$page]);
    }

    public function create(Request $request)
    {
        $request->validate([
            "my_file"=>"required|mimes:pdf,doc,docx,txt,png,jpg,jpeg",
        ]);

        $filename = date("Y_m_d-H_i_s") .".". $request->file("my_file")->extension() ;
        $depotage = new Depotage();
        $depotage->piece_jointe = $filename;
        $depotage->user_id = Auth::user()->id;
        $depotage->save();
        $request->file("my_file")->storeAs("depotages",$filename);

        return back()->with("success","Fiche de dépotage créer avec succès");

    }

    public function delete($id)
    {
        $depotage = Depotage::find($id);
        Storage::delete("depotages"."//".$depotage->piece_jointe);
        $depotage->delete();
        return back()->with("success","La fiche a bien été supprimer");
    }

    public function download($id)
    {
        $depotage = Depotage::find($id);
        return Storage::download("depotages"."//".$depotage->piece_jointe);
    }
}
