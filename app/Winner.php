<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Winner extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'player', 'period'
    ];
}
