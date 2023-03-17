<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Company extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
            'denomenation',
            'siren',
            'siret',
            'forme_juridique',
            'forme_juridique_code',
            'capital',
            'effectif',
             'nb_dirigents',
            'categorie_juridique',
            'adresse',
            'code_postal',
            'ville',
            'code_naf',
            'code_nace',
            'site_internet',
            'nic',
            'nic_siege',
            'date_creation',
            'date_radiation',
            'date_immatriculation',
            'date_immatriculation_rcs',
            'user_id',
    ];
}