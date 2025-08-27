<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'vehicle_id',
        'start_date',
        'end_date',
        'price',
        'status',
    ];

    // Relation avec utilisateur (client)
    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    // Relation avec véhicule
    public function vehicle()
    {
        return $this->belongsTo(Voiture::class, 'vehicle_id');
    }
}
