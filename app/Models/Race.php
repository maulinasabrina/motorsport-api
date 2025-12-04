<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Race extends Model
{
    use HasFactory;

    protected $fillable = [
        'grand_prix',
        'date',
        'track',
        'laps',
        'weather',
    ];

    protected $casts = [
        'laps' => 'integer',
        'date' => 'date',
    ];
}
