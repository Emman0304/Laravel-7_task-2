<?php

namespace App\Exports;

use App\Students;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class StudentExport implements FromCollection,WithHeadings,WithEvents
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
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
   
                $event->sheet->getDelegate()->getStyle('A1:K1')
                                ->getFont()
                                ->setBold(true);
   
            },
        ];
    }
}
