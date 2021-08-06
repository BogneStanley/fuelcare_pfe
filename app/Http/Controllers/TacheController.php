<?php

namespace App\Http\Controllers;

use App\Models\Tache;
use Illuminate\Http\Request;

class TacheController extends Controller
{
    // creation d'une tâche
    public function create(Request $request, $id){
        $validator = $request->validate([
            "titre"=>"required",
            "description"=>"required",
        ]);

        $tache = new Tache();
        $tache->intitule = $validator["titre"];
        $tache->description = $validator["description"];
        $tache->status = false;
        $tache->user_id = $id;
        $tache->piece_jointe = null;
        $tache->save();

        return back();
    }

    public function delete($id)
    {
        $tache = Tache::find($id);
        $tache->delete();
        return back();
    }
}
