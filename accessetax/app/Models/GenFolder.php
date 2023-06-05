<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class GenFolder extends Model {
    use HasFactory, Notifiable;

    protected $fillable = [
        'numero_dossier',
        'statut_dossier' ,
        'attestation_non_rembourse',
        'pouvoir_jdmp',
        'contrat_de_prestation',
        'demande_rembourse',
        'courrier_cerfa',
        'jdmp_cerfa_14317_07',
        'jdmp_cerfa_14318_08',
        'jdmp_cerfa_14700_03',
        'jdmp_cerfa_14319',
        'jdmp_pouvoir_ae',
        'proposition_service',
        'base_folder_id',
    ];

    /**
    * Get the baseFolder that owns the GenFolder
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */

    public function baseFolder(): BelongsTo
    {
        return $this->belongsTo(BaseFolder::class, 'base_folder_id');
    }
}
