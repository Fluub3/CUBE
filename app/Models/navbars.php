<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class navbars extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'route', 'ordering'
    ];

}
