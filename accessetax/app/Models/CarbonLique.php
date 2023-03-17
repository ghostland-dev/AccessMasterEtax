<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class CarbonLique extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nom',
        'code_2',
        'code_1',
        'eligible',
    ];
}