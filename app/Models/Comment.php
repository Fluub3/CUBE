<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use CrudTrait;
    use HasFactory;

    // Define the table associated to the model
    protected $table = 'commentaires';

    // These data can be modified
    protected $fillable = [
        'Contenue',
        'id_ressource',
        'id_user',
        'id_User_Commenter',
        'ID_Ressource_Afficher',
    ];

    // Define relation toward other models
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
}
