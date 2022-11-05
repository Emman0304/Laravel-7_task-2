<?php

namespace App\Imports;

use App\Helpers\Helper;
use App\Students;
use App\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class StudentImport implements 
    ToModel,
    WithHeadingRow,
    WithValidation,
    SkipsOnFailure
{
    use Importable,SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $student_id = Helper::IDGenerator(new Students(),'student_no',5,'2022A');

        Students::create([
           'student_no' => $row["student_no"]=$student_id,
           'lname' => $row["lastname"],
           'fname'=> $row["firstname"],
           'mname'    => $row["mi"],
           'age'      => $row["age"],
           'gender'   => $row["gender"],
           'bday'     => $row["birthdate"], 
           'bplace'   => $row["birthplace"],
           'contact'  => $row["contact"], 
           'email'    => $row["email"],
           'address'  => $row["address"],
        ]);

        User::create([
            'username' => $row["student_no"]=$student_id,
            'email' => $row["email"],
            'password' =>  Hash::make($row["lastname"])
        ]);

    }

    public function rules(): array
    {
        return[
            '*.student_no' => ['unique:students,student_no'],
            '*.email' => ['email','unique:students,email'],
            '*.contact' => ['unique:students,contact']
        ];
    }
    // public function onFailure(Failure ...$failures)
    // {
        
    // }
}
