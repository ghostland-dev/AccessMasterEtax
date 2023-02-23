<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [

        'denomenation',
        'siren',
        'codeNaf',
        'codeNace',
        'codeNic',
        'capital',
        'juridicForm',
        'dateCessation',
        'domainActivity',
        'effectifs',
        'nbReponsibles',
        'statusRcs',
        'Address',
        'Street',
        'postalCode',
        'country',
        'website',
        'numberSites',
        'user_id',

    ];
}
