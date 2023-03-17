<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Responsible extends Model
{
    use HasFactory, Notifiable;

    protected $fillable =[
       'civilite',
       'nom_famille',
       'prenom',
       'fonction',
       'email',
       'mobile',
       'fax',
       'adresse',
       'code_postal',
       'ville',
       'pays',
       'date_naissance',
       'company_id',

    ];
}