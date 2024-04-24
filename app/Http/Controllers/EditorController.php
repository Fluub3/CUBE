<?php

namespace App\Http\Controllers;

use App\Models\ReponseCommentaire;
use App\Models\users;
use Illuminate\Http\Request;
use App\Models\ressources as ressources;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;




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
        // Charger les commentaires avec les utilisateurs associés
        $commentaires = Comment::with('user')->where('ressources_id', $id)->get();

        return view('ressources', compact('ressource', 'commentaires'));
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
        $ress->permission_ressource = $request->input('visibility');;
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

    public function addToFavorites(Request $request)
    {
        $userId = auth()->id();
        $ressourceId = $request->ressource_id;

        // Vérifier si la ressource est déjà dans les favoris de l'utilisateur
        $user = users::findOrFail($userId);
        $isFavorite = $user->favoris()->where('id_Ressource', $ressourceId)->exists();

        // Affiche la valeur de $isFavorite pour le débogage
        //dd($isFavorite);

        if ($isFavorite) {
            // Si la ressource est déjà dans les favoris, la retirer
            auth()->user()->favoris()->detach($ressourceId);
            //$user->favoris()->detach($ressourceId);
            return response()->json(['message' => 'Ressource retirée des favoris avec succès']);
        } else {
            // Si la ressource n'est pas dans les favoris, l'ajouter
            auth()->user()->favoris()->attach($ressourceId);
            //$user->favoris()->attach($ressourceId);
            return response()->json(['message' => 'Ressource ajoutée aux favoris avec succès']);
        }
    }


    public function checkFavorite($id)
    {
        // Récupérer l'utilisateur actuellement authentifié
        $user = Auth::user();

        // Vérifier si la ressource est dans les favoris de l'utilisateur
        $isFavorite = $user->favoris->contains($id);

        // Retourner la réponse JSON
        return response()->json(['isFavorite' => $isFavorite]);
    }

    public function generateLink($id)
    {
        // Trouver la ressource
        $ressource = ressources::findOrFail($id);

        // Vérifier si l'utilisateur est le créateur de la ressource
            // Générer le lien avec un token unique
            $token = Str::random(20);
            $link = route('ressource.show', ['id' => $id, 'token' => $token]);

            // Enregistrer le lien dans la base de données ou effectuer d'autres actions nécessaires

            // Rediriger l'utilisateur vers le lien généré
            return $link;

    }









    public function destroy($id)
    {
        $ressource = Ressources::findOrFail($id);

        $commentaires = Comment::where('ressources_id', $id)->get();

        // Supprimer chaque réponse associée
        foreach ($commentaires as $commentaire) {
            $commentaire->delete();
        }


        $ressource->delete();

        return redirect()->route('home')->with('success', 'Ressource supprimée avec succès');
    }

}
