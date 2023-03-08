<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    $fillable = [
        'nom',
        'siret',
        'adresse',
        'code_postal',
        'ville',
        'pays',
        'telephone',
        'fax',
        'email',
        'consommation_electrcite',
        'consommation_gaz',
        'type',
    ]
}
