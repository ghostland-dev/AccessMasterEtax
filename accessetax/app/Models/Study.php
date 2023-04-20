<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Study extends Model {
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

    public function alerts() {
        return $this->hasMany( Alerte::class );
    }

    public function eligibilityCSPEs() {
        return $this->hasMany( EligibilityCSPE::class );
    }

    public function eligibilityTICGNs() {
        return $this->hasMany( EligibilityTCGN::class );
    }

    public function baseFolders() {
        return $this->hasMany( BaseFolder::class );
    }

    public function elecMeters() {
        return $this->hasMany( ElecMeter::class );
    }

    public function gazMeters() {
        return $this->hasMany( GazMeter::class );
    }

    public function site() {
        return $this->belongsTo( Site::class, 'site_id' );
    }
}
