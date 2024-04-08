<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditorController extends Controller
{
    //
    public function index()
    {
        return view('editor');
    }

    public function save(Request $request)
    {
        // Logique pour sauvegarder le contenu dans la base de données
        return view('editor');

    }
}
