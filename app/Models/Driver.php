<?php

namespace App\Models;
use \Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'team',
        'country',
        'number',
        'age',
        'photo_url',
    ];

    protected $casts = [
        'age' => 'integer',
        'number' => 'integer',
    ];
}
