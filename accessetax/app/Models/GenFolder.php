<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenFolder extends Model
{
    use HasFactory;
      /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [

        'folderNumber',
        'addedValue',
        'attestificationNonRefund',
        'abilityJDMP',
        'contractService',
        'requestRefund',
        'JMPDcerfa14317_07',
        'JMPDcerfa14318_08',
        'JMPDcerfa14700_03',
        'JMPDcerfa1439',
        'JMPDabilityAE',
        'ServiceOffer',
        'baseFolder_id',
        
        
        
        
    ];
}
