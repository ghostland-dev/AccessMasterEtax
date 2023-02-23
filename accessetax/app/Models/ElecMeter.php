<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElecMeter extends Model
{
    use HasFactory;


     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [

        'PDL',
        'siret',
        'sugment',
        'intensity',
        'profile',
        'street',
        'postalCode',
        'city',
        'state',
        'country',
        'supplier',
        'contractType',
        'expirationDate',
        'YCR',
        'councilOffice',
        'study_id',
        'supplier_id',

        
    ];
}
