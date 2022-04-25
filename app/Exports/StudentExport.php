<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Student::all();
    }

    public function headings() : array
    {
        return [
            'No',
            'Parent',
            'City',
            'Country',
            'Status',
            'Program',
            'Level',
            'Currency',
            'Price',
            'Status Payment',
        ];
    }
}
