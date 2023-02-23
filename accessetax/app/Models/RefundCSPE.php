<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefundCSPE extends Model
{
    use HasFactory;

          /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [

        'amountCSPE',
        'eligibleReducedTax',
        'ratioElecIntense',
        'carbonLique',
        'newReducedTax',
        'refundedClientAmout',
        'CSPEreducedTax',
        'unite',
        'study_date',
        'study_id',
 
        
    ];
}
