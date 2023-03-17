<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Contact extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'fonction',
        'mobile',
        'fix',
        'adresse',
        'code_postal',
        'ville',
        'pays',
        'type',
        'company_id',
    ];
}
