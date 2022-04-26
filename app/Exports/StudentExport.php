<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class StudentExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping, WithStyles, WithEvents
{
    public function collection()
    {
        return Student::with(['user', 'sppMonth'])->get();
    }

    public function map($student) : array
    {
        return [
            $student->id,
            $student->user->detail->parent,
            $student->user->detail->city,
            $student->user->detail->country,
            $student->user->detail->status,
            $student->sppMonth->level->program->name,
            $student->sppMonth->level->name,
            $student->sppMonth->price > 10000 ? 'USD' : 'IDR',
            $student->sppMonth->price,
            $student->sppMonth->status,
        ];
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

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {

                $event->sheet->getDelegate()->getStyle(1)
                    ->getAlignment()

                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            },
        ];
    }
}
