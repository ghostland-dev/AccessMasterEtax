<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefundTCGN extends Model
{
    use HasFactory;

    protected $fillable = [
       'valuer_ajoutee',
       'car_gaz',
       'car_elec',
       'car_autre',
       'valeur_production',
       'achat_prod_gaz',
       'achat_prod_petrol',
       'achat_chatleur',
       'achat_autres_prod',
       'eligibilite',
    ];
}
