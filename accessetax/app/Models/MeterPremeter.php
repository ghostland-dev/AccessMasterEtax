<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeterPremeter extends Model
{
    use HasFactory;

          /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [

        'meterC5',
        'meterC4',
        'meterHTA',
        'meterT2',
        'meterT3',
        'meterT4',
        
    ];
}
