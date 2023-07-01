<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class EligibilityTCGN extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'fullvalidation',
        'siren',
        'Validation03',
        'Validation02',
        'Validation01',
        'fullvalidation',
        'esitmationEconomie',
        'SommeTotalTaxElecPlein',
        'SommeTotalTaxGazPlein',
        'SommeTotalTaxTCGNReduit',
        'chiffreAffaireBrut_AE',
        'chiffreAffaireNet_AE',
        'study_id',
        'valeurAjouterEuro',
        'consumAnGazKwh',
        'consumAnElecKwh',
        'valeurProduction',
        'achatGaz',
        'achatPetroliers',
        'achatChaleur',
        'autres',
        'consumAnAutreKwh',
        'pourcentageConsuPorcessus',
        'NaceCode',
        'combustionProcessus'
    ];

    /**
     * Get the Study that owns the EligibilityCSPE
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function study(): BelongsTo
    {
        return $this->belongsTo(Study::class, 'study_id');
    }
}
