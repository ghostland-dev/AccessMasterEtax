<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsible extends Model
{
    use HasFactory;

    $fillable =[
       'choices',
       'nom_famille',
       'prenom',
       'fonction',
       'email',
       'telephone',
       'mobile',
       'fax',
       'adresse',
       'code_postal',
       'ville',
       'pays',
       'date_naissance',
       'company_id',

    ]
}
