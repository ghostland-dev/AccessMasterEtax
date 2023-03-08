<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseDocument extends Model
{
    use HasFactory;

    protected $fillable = [
       'cgv_access_anergies',
       'rib_entreprise',
       'kabis',
       'bilan_comptable_1',
       'bilan_comptable_2',
       'annexe_1',
       'annexe_2',
       'courrier_type',
       'confirmation_douanaire',
       'fichier_entreprise',
       'valeur_ajoutee',
       'base_folder_id',
    ];
}
