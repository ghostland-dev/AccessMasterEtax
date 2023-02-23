<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GazMeter extends Model
{
    use HasFactory;

      /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [

        'PCE',
        'siret',
        'profile',
        'tarif',
        'consumption',
        'study_id',
        'supplier_id',
        
        
    ];
}
