<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GenderChart extends Model
{
    protected $fillable = [
        'male',
        'female',
        'other'
    ];
}
