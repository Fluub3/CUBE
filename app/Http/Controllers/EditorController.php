<?php

namespace App\Http\Controllers;

use App\Models\users;
use Illuminate\Http\Request;
use App\Models\ressources as ressources;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;




class EditorController extends Controller
{
    

    public function index()
    {
        $ressources = Ressources::all(); // Retrieve all the ressources from the database
        return view('home', ['ressources' => $ressources]);
    }



    public function show($id)
    {
        $ressource = ressources::findOrFail($id);
        // Load the comments with the associated users
        $commentaires = Comment::with('user')->where('ressources_id', $id)->get();

        return view('ressources', compact('ressource', 'commentaires'));
    }



    public function save(Request $request)
    {
        // Retrieve the actual auth user
        $user = Auth::user();

        // Create a new Ressource
        $ress = new ressources;

        // We set the data retrieve from the from in the HTML and put it in the new ress object
        $ress->Titre_ressource = $request->input('title');
        $ress->Contenue = $request->input('contenue');
        $ress->Date = now();
        $ress->id_user = $user->id;     // Retrieve the id of the current user
        $ress->Nb_vue = 0;
        $ress->Status = 'Actif';
        $ress->id_commentaire = 0;
        $ress->permission_ressource = $request->input('visibility');;
        $ress->id_Permission_Ressource_Permettre = 0;
        $ress->id_User_Creer = $user->id; // Same here with the current user id

        // Save the ress in the database
        $ress->save();

        // Redirect the user to the main page
        return redirect()->route('home')->with('success', 'La ressource a été enregistrée avec succès.');
    }

    public function edit($id)
    {
        // Edit mode for the ress
        $ressource = Ressources::findOrFail($id);
        return view('editRessources', ['ressource' => $ressource]);
    }

    public function update(Request $request, $id)
    {
        // Here we update the ress after an edit mode
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

        // We check that the ress isn't in the fav of the user already
        $user = users::findOrFail($userId);
        $isFavorite = $user->favoris()->where('id_Ressource', $ressourceId)->exists();

        if ($isFavorite) {
            // if the ress if already in the fav we delete it from the fave of the user
            auth()->user()->favoris()->detach($ressourceId);
            return response()->json(['message' => 'Ressource retirée des favoris avec succès']);
        } else {
            // if the ress is not in the fav we add it in the fav of the user
            auth()->user()->favoris()->attach($ressourceId);
            return response()->json(['message' => 'Ressource ajoutée aux favoris avec succès']);
        }
    }


    public function checkFavorite($id)
    {
        $user = Auth::user();

        // Check if the ress if in the favorite of the user
        $isFavorite = $user->favoris->contains($id);

        // Return the data in json
        return response()->json(['isFavorite' => $isFavorite]);
    }

    public function generateLink($id)
    {
        // Find the ress
        $ressource = ressources::findOrFail($id);

        // Check if the user is the creator of the ress
            // Generate a link with a unique token
            $token = Str::random(20);
            $link = route('ressource.show', ['id' => $id, 'token' => $token]);

            // TOTO add a save in the database of the link

            // Redirect the user toward the link
            return $link;

    }









    public function destroy($id)
    {
        $ressource = Ressources::findOrFail($id);
        $ressource->delete();

        return redirect()->route('home')->with('success', 'Ressource supprimée avec succès');
    }

}
