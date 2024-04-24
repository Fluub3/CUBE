<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReponseCommentaire;

class ReponseCommentaireController extends Controller
{



    public function store(Request $request)
    {
        // Validate the form request
        $request->validate([
            'commentaire_id' => 'required|exists:commentaires,id',
            'contenu' => 'required|string|max:255',
        ]);

        // Create a new comments
        ReponseCommentaire::create([
            'id_commentaire' => $request->commentaire_id,
            'id_user' => auth()->id(), 
            'id_User_Appartenir' => auth()->id(), 
            'Contenue' => $request->contenu,
            'Id_Commentaire_Afficher' => $request->commentaire_id, 
        ]);

        return redirect()->back()->with('success', 'Votre réponse a été ajoutée avec succès !');
    }

}



