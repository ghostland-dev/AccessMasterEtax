<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class BaseFolder extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'numero_dossier',
        'statut_dossier',
        'nom_dossier',
        'nom_client',
        'study_id',
    ];

    /**
     * Get the BaseDocument associated with the BaseFolder
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

    public function baseDocuments(): HasMany
    {
        return $this->hasMany(BaseDocument::class);
    }


    public function genFolders(): HasMany
    {
        return $this->hasMany(GenFolder::class);
    }
}
