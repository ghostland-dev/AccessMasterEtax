<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class ElecMeter extends Model {
    use HasFactory, Notifiable;

    protected $fillable = [
        'nom_compteur',
        'PDL',
        'puissance',
        'numero_client',
        'numero_site',
        'numero_etude',
        'numero_contrat',
        'fournisseur',
        'profile',
        'consommation',
        'annee',
        'site_id',
    ];

    public function Contracts() {
        return $this->hasMany( ElecContract::class );
    }

    public function Site(): BelongsTo
    {
        return $this->belongsTo(Site::class, 'site_id' );
    }
}
