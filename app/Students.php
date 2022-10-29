<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    // protected $table = 'students';
    
    protected $fillable= [
        'student_no',
        'firstname',
        'lastname',
        'mname',
        'gender',
        'bday',
        'bplace',
        'age',
        'contact',
        'email',
        'address'

    ];
}
