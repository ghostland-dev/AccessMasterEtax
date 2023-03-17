<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class BaseFolder extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'numero_dossier',
        'statut_dossier',
        'nom_dossier',
        'nom_client',
        'student_id',
    ];
}