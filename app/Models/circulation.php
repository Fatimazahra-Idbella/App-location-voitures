<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class circulation extends Model
{
    use HasFactory;
    protected $fillable = [
        'circulation',
    ];
}
