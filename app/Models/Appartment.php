<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appartment extends Model
{
    use HasFactory;

    protected $fillable = [
        'Miestas',
        'Adresas',
        'Description',
        'Plotas',
        'Kaina',
        'Owner',
        'Img'
    ];
}
