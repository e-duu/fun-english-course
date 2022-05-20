<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class UsersImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function startRow(): int
    {
        return 2;
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new User([
            'name' => $row[1],
            'number' => $row[2],
            'username' => $row[3],
            'password' => $row[4],
            'role' => $row[5],
            'parent' => $row[6],
            'city' => $row[7],
            'country' => $row[8],
            'status' => $row[9],
            'email' => $row[10]
        ]);
    }
}
