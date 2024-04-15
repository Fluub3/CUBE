<?php

namespace App\Models;

use App\Models\ressources as ressources;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    use HasFactory;

    public function favoris()
    {
        return $this->belongsToMany(Ressources::class, 'ajout_favori', 'id_User', 'id_Ressource');
    }
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
        'Permission',
        'Id_Ressource',
        'Id_commentaire',
        'Id_Reponse_Com'
    ];
}
