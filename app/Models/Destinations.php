<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Destinations extends Model
{
    protected $table = 'destination';
    protected $fillable = [
        'name',
        'description',
        'location',
        'working_days',
        'working_hours',
        'ticket_price'
    ];
}
