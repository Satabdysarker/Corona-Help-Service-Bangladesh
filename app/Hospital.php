<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $fillable = [
        'name', 'city', 'divition', 'phone', 'address', 'today_test_count', 'total_test_count','available_seat'
    ];
}
