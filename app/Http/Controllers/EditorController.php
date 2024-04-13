<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ressources as ressources;
use Illuminate\Support\Facades\Auth;



use App\Models\content as content;
 

class EditorController extends Controller
{
    //

    public function index()
    {
        $ressources = Ressources::all(); // Récupère toutes les ressources de la base de données
        return view('home', ['ressources' => $ressources]);
    }


    public function show($id)
    {
        $ressource = ressources::findOrFail($id);
        return view('/ressources', ['ressource' => $ressource]);

    public function index()
    {
        return view('editor');
    }

    public function save(Request $request)
    {
        // Récupérer l'utilisateur actuellement authentifié
        $user = Auth::user();

        // Créer une nouvelle ressource
        $ress = new ressources;

        // Définir les valeurs des champs de la ressource
        $ress->Titre_ressource = $request->input('title');
        $ress->Contenue = $request->input('contenue');
        $ress->Date = now();
        $ress->id_user = $user->id; // Utiliser l'ID de l'utilisateur actuel
        $ress->Nb_vue = 0;
        $ress->Status = 'Actif';
        $ress->id_commentaire = 0;
        $ress->id_permission_ressource = 0;
        $ress->id_Permission_Ressource_Permettre = 0;
        $ress->id_User_Creer = $user->id; // Utiliser l'ID de l'utilisateur actuel

        // Enregistrer la ressource dans la base de données
        $ress->save();

        // Rediriger l'utilisateur vers la page d'accueil
        return redirect()->route('home')->with('success', 'La ressource a été enregistrée avec succès.');
    }

    public function edit($id)
    {
        $ressource = Ressources::findOrFail($id);
        return view('editRessources', ['ressource' => $ressource]);
    }
    public function update(Request $request, $id)
    {
        $ressource = Ressources::findOrFail($id);
        $ressource->Titre_ressource = $request->input('Titre_ressource');
        $ressource->Contenue = $request->input('contenue');
        $ressource->save();

        return redirect()->route('ressource.show', ['id' => $id])->with('success', 'Ressource mise à jour avec succès');
    }

    public function destroy($id)
    {
        $ressource = Ressources::findOrFail($id);
        $ressource->delete();

        return redirect()->route('home')->with('success', 'Ressource supprimée avec succès');
    }


        $ress = new content;
        //à voir pour le titre de la ressources pcq j'ai pas de champ la
        $ress->Contenue = $request->input('editor-content');
        $ress->Date = now();
        $ress->id_user = $_SESSION;
        
        $ress->save();
        return view('editor');

    }
}
