<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ActivityCode extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
            'code_naf',
            'code_nace',
            'libelle_naf',
            'libelle_nace',
    ];
}
