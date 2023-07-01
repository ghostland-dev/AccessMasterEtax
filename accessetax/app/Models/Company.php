<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Site;
use App\Models\User;
use App\Models\Contact;
use App\Models\Responsible;

class Company extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'denomination',
        'siren',
        'siret',
        'tel',
        'fix',
        'email',
        'forme_juridique',
        'forme_juridique_code',
        'capital',
        'effectif',
        'nb_dirigents',
        'categorie_juridique',
        'adresse',
        'code_postal',
        'ville',
        'code_naf',
        'code_nace',
        'site_internet',
        'nic',
        'nic_siege',
        'date_creation',
        'date_radiation',
        'user_id',
    ];

    public function sites()
    {
        return $this->hasMany(Site::class);
    }

    public function responsibles()
    {
        return $this->hasMany(Responsible::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function utilisateur()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
