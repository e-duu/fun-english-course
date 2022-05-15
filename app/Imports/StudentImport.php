<?php

namespace App\Imports;

use App\Models\Level;
use App\Models\Student;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class StudentImport implements ToModel, WithStartRow
{
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

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
        $user = User::where('role', 'student')->where('name', 'like', '%'.$row[4].'%')->where('parent', 'like', '%'.$row[1].'%')->first();

        if ($user) {
            Student::create([
                'month' => $row[6],
                'price' => $row[5],
                'user_id' => $user->id,
                'level_id' => $this->id,
            ]);
        }
    }
}
