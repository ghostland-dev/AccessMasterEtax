<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class CodeNaf extends Model
{
   use HasFactory, Notifiable;

    protected $fillable = [
        'code_naf',
        'libelle_naf',
        'eligible'
    ];
}