<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class GazContract extends Model {
    use HasFactory, Notifiable;

    protected $fillable = [
        'nom_contrat',
        'fournisseur',
        'date_debut',
        'date_fin',
        'date_signature',
        'fichier',
        'gaz_meter_id',
    ];

    public function gazBills(): HasMany {
        return $this->hasMany( GazBill::class );
    }

    /**
    * Get the contract that owns the GazContract
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */

    public function gazMeter(): BelongsTo {
        return $this->belongsTo( GazMeter::class, 'gaz_meter_id' );
    }
}
