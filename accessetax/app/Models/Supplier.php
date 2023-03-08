<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
       'nom_fournisseur',
       'contact',
       'email',
       'tel',
       'address',
       'city',
       'country',
       'zip_code',
       'siret',

    ];
}
