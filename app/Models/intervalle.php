<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class intervalle extends Model
{
    use HasFactory;
    protected $fillable = [
        'intervalle_videnge',
        'intervalle_plaquette',
        'intervalle_croix',
        'intervalle_assurance',
        'intervalle_visit',
        'intervalle_circulation',
    ];
}
