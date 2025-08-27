<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voiture extends Model
{
    use HasFactory;

  protected $fillable = [
    'marque',
    'model',
    'matriculG',
    'matriculL',
    'matriculS',
    'compteur',
    'd_compteur',
];


public function contracts()
{
    return $this->hasMany(Contract::class, 'vehicle_id');
}

}
