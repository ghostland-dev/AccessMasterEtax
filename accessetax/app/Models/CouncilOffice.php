<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class CouncilOffice extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
       'council_office_name',
       'council_office_address',
       'nic_code',
    ];


}