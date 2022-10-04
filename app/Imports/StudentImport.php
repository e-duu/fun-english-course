<?php

namespace App\Imports;

use App\Models\Invoice;
use App\Models\Student;
use App\Models\User;
use Carbon\Carbon;
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
        $code = mt_rand(1, 999);

        $user = User::where('role', 'student')->where('number', $row[1])->first();
        $teacher = User::where('role', 'teacher')->where('number', $row[3])->first();

        if ($user) {
            foreach ($user->levels as $level) {
                if ($this->id == $level->id) {
                    $student = Student::create([
                        'status' => 'paid_manually',
                        'price' =>  $row[4],
                        'currency' => $row[5],
                        'month' => $row[6],
                        'code' => $code,
                        'year' => $row[7],
                        'user_id' => $user->id,
                        'level_id' => $this->id,
                        'teacher_id' => $teacher->id,
                    ]);

                    // $inv = Invoice::count();

                    // $yymm = Carbon::now()->format('ym');

                    // if ($inv) {
                    //     $number = $inv + 1;
                    // } else if (Carbon::now() == date('Y-01-01')) {
                    //     $number = 1;
                    // } else {
                    //     $number = 1;
                    // }

                    $yymm = Carbon::now()->format('ym');

                    if (date('Y-m-d') == date('Y-01-01')) {
                        $number = 1;
                    } else {
                        $inv = Invoice::pluck('numberInv')->last();
                        if ($inv) {
                            $number = $inv + 1;
                        } else {
                            $number = 1;
                        }
                    }

                    Invoice::create([
                        'dateCode' => $yymm,
                        'numberInv' => $number,
                        'student_id' => $student->id,
                    ]);
                }
            }
        }
    }
}
