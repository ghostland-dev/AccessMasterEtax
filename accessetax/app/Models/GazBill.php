<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class GazBill extends Model {
    use HasFactory, Notifiable;

    protected $fillable = [
        'nom_facture',
        'date_debut',
        'date_fin',
        'fournisseur',
        'fichier',
        'type',
        'numero_facture',
        'numero_contrat',
        'numero_compteur',
        'numero_client',
        'numero_site',
        'numero_etude',
        'consommation',
        'annee',
        'gaz_contract_id',
    ];

    public function gazContract(): BelongsTo {
        return $this->belongsTo( GazContract::class, 'gaz_contract_id' );
    }
}
