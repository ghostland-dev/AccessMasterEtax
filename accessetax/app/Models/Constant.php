<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Constant extends Model
{
   use HasFactory, Notifiable;

    protected $fillable = [
        'tcgn_plein',
        'tcgn_reduit',
        'cspe',
    ];
}