<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // Définition de la table associée au modèle
    protected $table = 'commentaires';

    // Indication des colonnes pouvant être massivement affectées
    protected $fillable = [
        'Contenue',
        'id_ressource',
        'id_user',
        'id_User_Commenter',
        'ID_Ressource_Afficher',
    ];

    // Définition des relations avec d'autres modèles
    // Dans votre modèle Commentaire
    public function user()
    {
        return $this->belongsTo(users::class);
    }



    public function resource()
    {
        return $this->belongsTo(ressources::class, 'id_ressource');
    }

    public function reponses()
    {
        return $this->hasMany(ReponseCommentaire::class, 'id_commentaire');
    }


    // Autres méthodes ou attributs du modèle, le cas échéant
}
