<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GazContract extends Model
{
    use HasFactory;

         /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [

        'contractReference',
        'supplier',
        'dateStartSupply',
        'dateEndSupply',
        'dateSignature',
        'totalConsuption',
        'gazMeter_id',
    ];
}
