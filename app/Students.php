<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $table = 'students';
    
    protected $fillable= [
        'student_no',
        'fname',
        'lname',
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
