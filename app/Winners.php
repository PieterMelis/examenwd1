<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Winners extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'player', 'period'
    ];
}
