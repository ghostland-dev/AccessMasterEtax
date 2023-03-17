<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ElecContract extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nom_contrat',
        'fournisseur',
        'date_debut',
        'date_fin',
        'fichier',
        'date_signature',
        'elec_meter_id',
    ];
}