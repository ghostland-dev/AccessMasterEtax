<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    ];

    public function Contracts()
    {
        return $this->hasMany(GazContract::class);
    }

    public function Site(): BelongsTo
    {
        return $this->belongsTo(Site::class, 'site_id');
    }
}
