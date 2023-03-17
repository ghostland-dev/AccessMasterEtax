<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Study extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
       'nom_etude',
       'nom_client',
       'nom_contact',
       'nom_responsable',
       'date_debut',
       'date_fin',
       'site_id',

    ];
}