<?php

namespace App\Http\Controllers;

use App\Mail\CPmail;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CPFilterStudentController extends Controller
{
    // Filter Student Per Level
    public function filter(Request $request)
    {
        $levelFt = $request->level;

        $student = Student::whereHas('level', function($query){
            $query->findOrFail(request()->level);
        })->get();

        return $student;
    }

    // Kirim alert perlevel sekaligus (checkbox) / bisa per student
    public function sendAlert(Request $request)
    {
        $id = $request->student_id;

        foreach ($id as $key => $student) {
            $student = Student::findOrFail($request->student_id);

            Mail::to($student->user->email)->send(new CPmail());
        }
    }
}
