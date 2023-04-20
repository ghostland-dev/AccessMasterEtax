<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;

class BaseFolder extends Model {
    use HasFactory, Notifiable;

    protected $fillable = [
        'numero_dossier',
        'statut_dossier',
        'nom_dossier',
        'nom_client',
        'student_id',
    ];

    /**
    * Get the BaseDocument associated with the BaseFolder
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasOne
    */

    public function baseDocument(): HasOne {
        return $this->hasOne( BaseDocument::class );
    }

    public function genFolder(): HasOne {
        return $this->hasOne( GenFolder::class );
    }
}
