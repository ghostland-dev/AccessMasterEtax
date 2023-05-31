<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Site extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nom',
        'siret',
        'adresse',
        'code_postal',
        'ville',
        'pays',
        'telephone',
        'fax',
        'email',
        'consommation_electrcite',
        'consommation_gaz',
        'type',
        'company_id',
    ];

    public function etudes()
    {
        return $this->hasMany(Study::class);
    }

    public function company():BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
