<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\content as content;
 

class EditorController extends Controller
{
    //
    public function index()
    {
        return view('editor');
    }

    public function save(Request $request)
    {
        $ress = new content;
        //à voir pour le titre de la ressources pcq j'ai pas de champ la
        $ress->Contenue = $request->input('editor-content');
        $ress->Date = now();
        $ress->id_user = $_SESSION;
        
        $ress->save();
        return view('editor');

    }
}
