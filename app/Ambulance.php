<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ambulance extends Model
{
    protected $fillable = [
        'name', 'city', 'divition', 'hospital_name', 'phone', 'address',
    ];
}
