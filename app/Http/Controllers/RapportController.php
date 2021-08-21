<?php

namespace App\Http\Controllers;

use App\Models\Rapport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Storage;

class RapportController extends Controller
{
    //
    public function index()
    {
        $rapports = Auth::user()->rapports;
        return view("gerant.rapports", ["rapports"=>$rapports]);
    }

    public function create(Request $request)
    {
        $request->validate([
            "titre"=>"required",
            "my_file"=>"required|mimes:pdf,doc,docx,txt",
        ]);

        $titres = explode(" ",$request->titre);
        $titre = join("_",$titres);
        $filename = $titre . "_" . time() .".". $request->file("my_file")->extension() ;
        $rapport = new Rapport();
        $rapport->piece_jointe = $filename;
        $rapport->user_id = Auth::user()->id;
        $rapport->save();
        $request->file("my_file")->storeAs("rapports",$filename);

        return back();

    }

    public function delete($id)
    {
        $rapport = Rapport::find($id);
        Storage::delete("rapports"."//".$rapport->piece_jointe);
        $rapport->delete();
        return back();
    }

    public function download($id)
    {
        $rapport = Rapport::find($id);
        return Storage::download("rapports"."//".$rapport->piece_jointe);
    }
}
