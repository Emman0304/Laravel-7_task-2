<?php

namespace App\Imports;

use App\Helpers\Helper;
use App\Helpers\HelperUser;
use App\Students;
use App\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class UserImport implements ToModel,WithHeadingRow,WithValidation,SkipsOnFailure
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

        return new User([
            'username' => $row["student_no"]=$student_id,
            'password' => Hash::make($row["lastname"]),
            'email'    => $row["email"]
        ]);
    }
    public function rules(): array
    {
        return[
            '*.student_no' => ['unique:users,username'],
            '*.email' => ['unique:users,email']
        ];
    }
}
