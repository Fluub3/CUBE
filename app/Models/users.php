<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use App\Models\ressources as ressources;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    use CrudTrait;
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
        'Status',
        'Favoris',
        'Permission',
        'is_admin'
    ];
}
