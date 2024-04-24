<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ressources extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'Titre_ressource',
        'Contenue',
        'id_user',
        'Date',
        'Status',
        'id_commentaire',
        'id_permission_ressource',
        'id_Permission_Ressource_Permettre',
        'id_User_Creer',
    ];

    public function utilisateurs()
    {
        return $this->belongsToMany(User::class, 'ajout_favori', 'id_Ressource', 'id_User');
    }
    public function commentaires()
    {
        return $this->hasMany(Comment::class);
    }

}
