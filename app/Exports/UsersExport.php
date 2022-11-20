<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class UsersExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
    }

    public function map($user) : array
    {
        return [
            $user->name,
            $user->number,
            $user->username,
            $user->role,
            $user->parent,
            $user->city,
            $user->country,
            $user->status,
            $user->email,
        ];
    }

    public function headings() : array
    {
        return [
            'Name',
            'Number',
            'Username',
            'Role',
            'Parent Name',
            'City',
            'Country',
            'Status',
            'Email',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
