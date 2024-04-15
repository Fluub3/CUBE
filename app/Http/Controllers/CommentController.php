<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment; // Assurez-vous d'importer le modèle de commentaire si ce n'est pas déjà fait

class CommentController extends Controller
{

    public function show($id)
    {
        $commentaire = Comment::with('reponses.user')->findOrFail($id);
        return view('commentaire.show', compact('commentaire'));
    }

    public function edit($id)
    {
        $commentaire = Comment::findOrFail($id);
        // Vérifiez si l'utilisateur est autorisé à modifier ce commentaire
        if ($commentaire->user_id !== auth()->id()) {
            // Redirigez l'utilisateur avec un message d'erreur ou affichez une vue d'erreur
            return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé à modifier ce commentaire.');
        }
        return view('commentaire.edit', compact('commentaire'));
    }

    public function update(Request $request, $id)
    {
        $commentaire = Comment::findOrFail($id);
        // Vérifiez si l'utilisateur est autorisé à modifier ce commentaire
        if ($commentaire->user_id !== auth()->id()) {
            // Redirigez l'utilisateur avec un message d'erreur ou affichez une vue d'erreur
            return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé à modifier ce commentaire.');
        }
        $commentaire->update([
            'Contenue' => $request->contenu,
        ]);
        return redirect()->back()->with('success', 'Commentaire modifié avec succès !');
    }
    public function destroy($id)
    {
        $commentaire = Comment::findOrFail($id);
        // Vérifie si l'utilisateur actuel est l'auteur du commentaire
        if ($commentaire->user_id !== auth()->id()) {
            // Redirigez l'utilisateur avec un message d'erreur ou affichez une vue d'erreur
            return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé à supprimer ce commentaire.');
        }
        $commentaire->delete();
        return redirect()->back()->with('success', 'Commentaire supprimé avec succès !');
    }



    public function store(Request $request, $ressource_id)
    {
        // Validation des données du formulaire de commentaire


        // Création d'une nouvelle instance de commentaire avec les données validées
        $comment = new Comment();
        $comment->Contenue = $request->input('comment');
        $comment->ressources_id = $ressource_id; // Affectation de l'ID de la ressource récupéré de l'URL
        $comment->user_id = auth()->id(); // Récupération de l'ID de l'utilisateur authentifié
        $comment->id_User_Commenter = auth()->id(); // Récupération de l'ID de l'utilisateur qui commente à partir de la requête
        $comment->ID_Ressource_Afficher = $ressource_id; // Récupération de l'ID de la ressource affichée à partir de la requête

        // Enregistrement du commentaire dans la base de données
        $comment->save();

        // Redirection ou réponse appropriée
        return redirect()->back()->with('success', 'Commentaire ajouté avec succès');
    }


}
