<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class Alerte extends Model {
    use HasFactory, Notifiable;

    protected $fillable = [
        'nom_alerte' ,
        'description_alerte',
        'type_alerte',
        'statut_alerte',
        'study_id',
    ];

    /**
    * Get the alert that owns the Alerte
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */

    public function alert(): BelongsTo {
        return $this->belongsTo( Alert::class, 'study_id' );
    }

}
