<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'password',
        'nom',
        'prenom',
        'date_nais',
        'rue',
        'cp',
        'ville',
        'mail',
        'date_inscription',
        'date',
        'Status',
        'Favoris',
        'Id_Groupe',
        'Id_Ressource',
        'Id_commentaire',
        'Id_Reponse_Com'
    ];
}
