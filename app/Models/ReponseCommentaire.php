<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReponseCommentaire extends Model
{
    protected $fillable = ['id_commentaire', 'id_user', 'Contenue','Id_Commentaire_Afficher','id_User_Appartenir'];

    public function commentaire()
    {
        return $this->belongsTo(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user'); // Assurez-vous de remplacer 'id_user' par la clé étrangère appropriée dans votre table reponse_commentaires
    }

}
