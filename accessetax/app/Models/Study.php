<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Study extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nom_etude',
        'nom_client',
        'nom_contact',
        'nom_responsable',
        'date_debut',
        'date_fin',
        'site_id',

    ];

    public function alertes(): HasMany
    {
        return $this->hasMany(Alerte::class);
    }

    public function eligibilityCSPEs(): HasMany
    {
        return $this->hasMany(EligibilityCSPE::class);
    }

    public function eligibilityTICGNs(): HasMany
    {
        return $this->hasMany(EligibilityTCGN::class);
    }

    public function baseFolders(): HasMany
    {
        return $this->hasMany(BaseFolder::class);
    }

    public function elecMeters(): HasMany
    {
        return $this->hasMany(ElecMeter::class);
    }

    public function gazMeters(): HasMany
    {
        return $this->hasMany(GazMeter::class);
    }

    public function site(): BelongsTo
    {
        return $this->belongsTo(Site::class, 'site_id');
    }
}
