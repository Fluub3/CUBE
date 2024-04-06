<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users as dbusers;

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
            $utilisateur->rue = "tagrandemerde";
            $utilisateur->cp = "34000";
            $utilisateur->date = $request->input('dob');
            $utilisateur->status = "actif";
            $utilisateur->Favoris = "34";

            $utilisateur->save();
        } else {

            // NEED TO ADD A ERROR MESSAGE
            return view('/Register');
        }    
    }

}