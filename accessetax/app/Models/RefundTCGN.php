<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefundTCGN extends Model
{
    use HasFactory;

          /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [

        'addedValue',
        'YCRgaz',
        'YCRelec',
        'YCRothers',
        'productionValue',
        'boughtProdGaz',
        'boughtProdElec',
        'boughtOthers',
        'boughtHeat',
        'eligiblity',
        'study_id',
        
        
        
        
        
    ];
}
