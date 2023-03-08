<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodeNaf extends Model
{
    use HasFactory;

    protected $fillable = [
        'code_naf',
        'libelle_naf',
        'eligible'
    ];
}
