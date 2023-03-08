<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefundCSPE extends Model
{
    use HasFactory;

    $fillable = [
      'annee'
      'entreprise'
      'siren'
      'code_naf'
      'veleur_ajoutee' ,
      'car' ,
      'unite',
      'date_verification' ,
      'elegibilite_activite' ,
      'eliegibilite_elec_intense' ,
      'study_id'
    ];
}
