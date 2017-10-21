<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    public $timestamps = false;
    protected $fillable = [
    'periodname', 'startdate', 'enddate'
    ];

}
