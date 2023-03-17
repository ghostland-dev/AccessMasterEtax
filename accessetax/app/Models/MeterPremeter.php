<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class MeterPremeter extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
       'compteur_c5',
       'compteur_c4',
       'compteur_hta',
       'compteur_t2',
       'compteur_t3',
       'compteur_t4',
       'company_id',
    ];
}
