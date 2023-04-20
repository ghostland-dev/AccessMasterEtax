<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class Contact extends Model {
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

    /**
    * Get the company that owns the Contact
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */

    public function company(): BelongsTo {
        return $this->belongsTo( Company::class, 'company_id' );
    }
}
