<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ressources as ressources;


class EditorController extends Controller
{
    //
    public function index()
    {
        //return view('editor');
    }

    public function save(Request $request)
    {
        $ress = new ressources;
        //à voir pour le titre de la ressources pcq j'ai pas de champ la

       /* echo $request->input('title');
        echo $request->input('editorContentInput');*/

        $ress->Titre_ressource = $request->input('title');
        $ress->Contenue = $request->input('editorContentInput');
        $ress->Date = now();
        $ress->id_user = '1';
        $ress->Nb_vue = 0;
        $ress->Status = 'Actif';
        $ress->id_commentaire = 0;
        $ress->id_permission_ressource = 0;
        $ress->id_Permission_Ressource_Permettre = 0;
        $ress->id_User_Creer = 0;

        $ress->save();

        echo "Succes";
        return view('home');

    }
}
