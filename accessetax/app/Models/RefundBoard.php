<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class RefundBoard extends Model {
    use HasFactory, Notifiable;
    protected $fillable = [
        'titre',
        'consommation_mkw',
        'remuneration',
    ];
}