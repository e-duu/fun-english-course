<?php

namespace App\Exports;

use App\Models\Student;
use DateTime;
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
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function collection()
    {
        return Student::where('level_id', $this->id)->with(['student'])->get();
    }

    public function map($student) : array
    {
        // convert number to month
        $dateObj = DateTime::createFromFormat('!m', $student->month);
        return [
            $student->student->parent ?? '-',
            $student->student->city ?? '-',
            $student->student->country ?? '-',
            $student->student->number ?? '-',
            $student->student->status ?? '-',
            $student->teacher->name ?? '-',
            $student->student->name ?? '-',
            $student->level->program->name ?? '-',
            $student->level->name ?? '-',
            $student->price,
            $student->currency,
            $student->status,
            $monthName = $dateObj->format('F'), // March
            $student->year,
            $student->invoice->created_at->format('d-m-Y'),
        ];
    }

    public function headings() : array
    {
        return [
            'Parent Name',
            'City',
            'Country',
            'Number',
            'Student Status',
            'Teacher',
            'Student Name',
            'Program',
            'Level',
            'Price',
            'Currency',
            'Status',
            'Month',
            'Year',
            'Receipt Date',
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
