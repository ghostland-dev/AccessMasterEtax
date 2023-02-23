<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseDocument extends Model
{
    use HasFactory;

       /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [

        'folderNumber',
        'CSVVoltaria',
        'acountableMap1',
        'acountableMap2',
        'annexe1',
        'annexe2',
        'customizedMail',
        'councilConfirme',
        'companyDetails',
        'addedValue',
        'KBIS',
        'RIB',
        'baseFolder_id',
        
        
        
        
    ];
}
