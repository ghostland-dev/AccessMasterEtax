<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarbonLique extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'code_2',
        'code_1',
        'eligible',
    ];
}
