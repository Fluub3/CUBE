<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReponseCommentaire;

class ReponseCommentaireController extends Controller
{



    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'commentaire_id' => 'required|exists:commentaires,id',
            'contenu' => 'required|string|max:255',
        ]);

        // Créer une nouvelle réponse au commentaire
        ReponseCommentaire::create([
            'id_commentaire' => $request->commentaire_id,
            'id_user' => auth()->id(), // Assurez-vous que ce champ correspond au nom de votre champ utilisateur
            'id_User_Appartenir' => auth()->id(), // Assurez-vous que ce champ correspond au nom de votre champ utilisateur
            'Contenue' => $request->contenu,
            'Id_Commentaire_Afficher' => $request->commentaire_id, // Spécifiez une valeur pour ce champ
        ]);

        return redirect()->back()->with('success', 'Votre réponse a été ajoutée avec succès !');
    }

}



