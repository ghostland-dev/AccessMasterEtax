<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class EligibilityCSPE extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'CAR',
        'codeNaf',
        'siren',
        'valeurAjouter',
        'CodeNafmessage',
        'MotnantCSPETauxReduit',
        'CSPEtauxPlein',
        'EligibiliteReduit',
        'RatioElectroIntense',
        'SoumisRisqueFuitCO2',
        'NouveaTauxReduit',
        'RemboursementClient',
        'chiffreAffaireBrut_AE',
        'chiffreAffaireNet_AE',
        'study_id',
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
