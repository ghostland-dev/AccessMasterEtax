<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ElecBill extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nom_facture',
        'fournisseur',
        'type',
        'numero_facture',
        'numero_contrat',
        'numero_compteur',
        'numero_client',
        'numero_site',
        'numero_etude',
        'consommation',
        'annee',
        'elec_contract_id',
    ];
}
