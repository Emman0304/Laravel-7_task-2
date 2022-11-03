<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Students extends Model
{
    // protected $table = 'students';
    
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
        'address',
        'image'

    ];

    public static function getStudents(){
        $records= DB::table('students')->select('student_no','lname','fname','mname','age','gender','bday','bplace','contact','email','address','image')->orderBy('id','asc')->get()->toArray();
        return $records;
    }
}
