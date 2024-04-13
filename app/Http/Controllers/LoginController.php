<?php

namespace App\Http\Controllers;

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
        // Récupérer les identifiants de connexion depuis la requête
        $credentials = $request->only('mail', 'password');

        // Authentifier l'utilisateur avec les identifiants fournis
        if (Auth::attempt($credentials)) {
            // L'utilisateur est authentifié, rediriger vers la page d'accueil
            return redirect()->route('home');
        } else {
            print_r($credentials);
            // L'authentification a échoué, rediriger vers la page de connexion avec un message d'erreur
            //return redirect()->route('connection')->with('error', 'Identifiants invalides');
        }
    }

    // Use to register a new user
        } 
    }

    public function openSession () {
        // TODO, opening the session in php
    }

    public function checkLogin (Request $request) {
        // This function retrieve the password and verify it match with the mail adress of the user
        
        // get the users password via its mail
        $user = new dbusers;
        $user = dbusers::where('mail', $request->mail)->get();

        // get the password from the web page
        $temppass1 =  bcrypt($request->input('password'));
        if($user->password == $temppass1){
            // OPEN THE SESSION IN PHP
        } else {
            // the password does not match we need to return the view of the login page
        }
        return ($user);
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
            // save the user in the database
            $utilisateur->save();
            return redirect()->route('home');
          // save the user in the database
            $utilisateur->save();
        } else {

            // NEED TO ADD A ERROR MESSAGE
            return view('/Register');
        }
    }

    public function logout()
    {
        Auth::logout(); // Déconnexion de l'utilisateur
        return redirect()->route('home'); // Redirection vers la page de connexion
        }    
    }

}
