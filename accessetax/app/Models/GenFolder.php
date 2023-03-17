<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class GenFolder extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
       'numero_dossier',
       'statut_dossier' ,
       'attestation_non_rembourse',
       'pouvoir_client',
       'contrat_de_prestation',
       'demande_rembourse',
       'courrier_cerfa',
       'client_cerfa_14317_07',
       'client_cerfa_14318_08',
       'client_cerfa_14700_03',
       'client_cerfa_14319',
       'client_pouvoir_ae',
       'proposition_service',
    ];
}
