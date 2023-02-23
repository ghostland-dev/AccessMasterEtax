<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EligibiliteCSPE extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [

         'year',
        'company',
        'siren',
        'codeNaf',
        'addedValue',
        'YCR',
        'unite',
        'verifiedDate',
        'eligibleActivity',
        'eligibleElecIntense',
        'study_id',
 
    ];
}
