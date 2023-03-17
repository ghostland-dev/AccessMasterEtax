<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Supplier extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
       'logo',
       'nom_fournisseur',
       'contact',
       'email',
       'fournisseur_gaz',
       'fournisseur_electrcite',
       'tel',
       'address',
       'city',
       'country',
       'zip_code',
       'siret',

    ];
}