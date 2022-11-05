<?php

namespace App\Exports;

use App\Students;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'student_no',
            'lastname',
            'firstname',
            'mi',
            'age',
            'gender',
            'birthdate',
            'birthplace',
            'contact',
            'email',
            'address'

        ];
    }
    public function collection()
    {
        return collect(Students::getStudents());
    }
}
