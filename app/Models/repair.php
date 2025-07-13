<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class repair extends Model
{
    use HasFactory;

    protected $fillable = [
        'videnge',
        'd_videnge',
        'plaquette',
        'croix_chaine',
        'isfilteroil',
        'isfilterair',
        'isfiltergasoil',
        'autre_repair',
    ];
}
