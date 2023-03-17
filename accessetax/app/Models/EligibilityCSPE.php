<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EligibilityCSPE extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'annee',
        'entreprise',
        'siren',
        'code_naf',
        'veleur_ajoutee',
        'car',
        'unite',
        'date_verification',
        'elegibilite_activite',
        'eliegibilite_elec_intense',
    ];
}
