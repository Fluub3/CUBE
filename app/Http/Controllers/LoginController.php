<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\users as dbusers; // Assurez-vous que ce chemin correspond à votre modèle utilisateur

class LoginController extends Controller
{
    // Méthode pour afficher le formulaire de connexion
    public function showLoginForm()
    {
        return view('Connection'); // Assurez-vous que la vue Connection.blade.php existe
    }

    // Méthode pour traiter la connexion
    public function login(Request $request)
    {
        // Validation des données du formulaire
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
       ]);

        // Tenter de se connecter
        if (Auth::attempt(['mail' => $credentials['email'], 'password' => $credentials['password']])) {
            

            // Stocker un message de succès dans la session
        session()->flash('success', 'Connexion réussie!');
// Rediriger vers une page spécifique, par exemple 'home'
return redirect()->route('home');
        }

        // Si la connexion échoue, rediriger vers le formulaire de connexion avec un message d'erreur
        return back()->withErrors([
            'email' => 'Les informations d\'identification fournies ne correspondent pas à nos enregistrements.',
        ])->onlyInput('email');
    }

    public function getMail(Request $request)
    {
        // Récupérer l'utilisateur par son e-mail
        $user = dbusers::where('mail', $request->mail)->first(); // Utilisez first() au lieu de get()

        // Vérifier que l'utilisateur existe
        if ($user) {
            return response()->json($user);
        } else {
            return response()->json(['error' => 'Utilisateur non trouvé'], 404);
        }
    }

    // Méthode pour enregistrer un nouvel utilisateur
    public function postUser(Request $request)
    {
        // Vérifier que les deux mots de passe sont identiques
        $temppass1 = $request->input('password');
        $temppass2 = $request->input('passwordConfirm');
        if ($temppass1 == $temppass2) {
            // Enregistrer l'utilisateur si les mots de passe correspondent
            $utilisateur = new dbusers;
            $utilisateur->nom = $request->input('lastName');
            $utilisateur->prenom = $request->input('firstName');
            $utilisateur->mail = $request->input('email');
            $utilisateur->password = bcrypt($request->input('password'));
            $utilisateur->rue = "tagrandemerde"; // Remplacez par la valeur appropriée
            $utilisateur->cp = "34000"; // Remplacez par la valeur appropriée
            $utilisateur->date = $request->input('dob');
            $utilisateur->status = "actif";
            $utilisateur->Favoris = "34"; // Remplacez par la valeur appropriée

            $utilisateur->save();
            return redirect()->to('route_qui_montre_utilisateur_connecté'); // Redirection après inscription
        } else {
            // Ajouter un message d'erreur si les mots de passe ne correspondent pas
            return back()->withErrors(['password' => 'Les mots de passe ne correspondent pas.'])->withInput();
        }
    }
}
