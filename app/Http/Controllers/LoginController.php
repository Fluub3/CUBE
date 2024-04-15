<?php

namespace App\Http\Controllers;

use App\Models\ressources as ressources;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\users as dbusers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getMail(Request $request) {

        // get the user in the bdd via it's mail
        $user = dbusers::where('mail', $request->mail)->get();
        // We check that the user exist
        if ($user) {
            // Retourner l'email de l'utilisateur
            return ($user);
        } else {
            // Retourner une réponse indiquant que l'utilisateur n'existe pas
            return ('Hello World');
        }
    }

    public function checkLogin(Request $request)
    {
        // Get the credential from the request
        $credentials = $request->only('mail', 'password');

        // Authenticate the users with the given credential
        if (Auth::attempt($credentials)) {
            // User is authentifed, redirection to the home page
            return redirect()->route('home');
        } else {
            // Authentification failed, return to the connexion page with the error
            return redirect()->route('connection')->with('error', 'Identifiants invalides');
        }
    }

    // Use to register a new user
    public function postUser(Request $request) {

        // Here we check that the two password are matching
        $temppass1 = $request->input('password');
        $temppass2 = $request->input('passwordConfirm');
        if ($temppass1 == $temppass2) {

            // if the two pass match, we get all the data to register the user
            $utilisateur = new dbusers;
            $utilisateur->nom = $request->input('lastName');
            $utilisateur->prenom = $request->input('firstName');
            $utilisateur->mail = $request->input('email');
            $utilisateur->password = bcrypt($request->input('password'));
            $utilisateur->rue = $request->input('rue');
            $utilisateur->cp = $request->input('cp');
            $utilisateur->ville = $request->input('ville');
            $utilisateur->date = $request->input('dob');
            $utilisateur->status = "actif";
            $utilisateur->Favoris = "0";
            $utilisateur->Permission = "0";
            // save the user in the database
            $utilisateur->save();
            return redirect()->route('home');
        } else {
            // Show a notification error if there is some problem with the values
            return view('/Register')->with('error', 'Veuillez remplir tout les champs du formulaire');
        }
    }


    public function Forgotpassword(Request $request){


        $mail = dbusers::where('mail', $request->mail)->first();

        $temppass1 = $request->input('password');
        $temppass2 = $request->input('passwordConfirm');

        if ($temppass1 == $temppass2) {

            $mail->password = bcrypt($temppass1);
            $mail->save();
            return redirect()->route('connection')->with('error', 'Mot de passe modifier');


        }else{
            return redirect()->route('forgot-password')->with('error', 'Mots de passe non identiques');

        }


    }


    public function favoris()
    {
        // Récupérer l'utilisateur authentifié
        $user = auth()->user();

        // Récupérer les favoris de l'utilisateur
        $favoris = $user->favoris()->get();

        return view('Favoris', ['favoris' => $favoris]);
    }

    public function updateUserPerm(Request $request){
        $user = dbusers::findOrFail($request->input('user'));
        $user->Permission = $request->input('permission');
        $user->save();

        echo "oui";
        return redirect()->route('Administrateur');
    }

    public function getUsers()
    {
        $users = User::all();
        return view('Administrator', ['users' => $users]);
    }


    public function logout()
    {
        Auth::logout(); // Déconnexion de l'utilisateur
        return redirect()->route('home'); // Redirection vers la page de connexion
    }

}
