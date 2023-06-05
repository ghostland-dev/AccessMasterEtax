<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class GazMeter extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'PCE',
        'siret',
        'nom_site',
        'nom_etude',
        'nom_client',
        'nom_contact',
        'nom_responsable',
        'profil',
        'tarif',
        'consommation_mentsauelle',
        'consommation_annuelle',
        'site_id',
        'study_id',

    ];

    public function Contracts(): HasMany
    {
        return $this->hasMany(GazContract::class);
    }

    public function Study(): BelongsTo
    {
        return $this->belongsTo(Study::class, 'study_id');
    }
}
