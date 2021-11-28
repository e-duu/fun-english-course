<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Program;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $studentCount = User::where('role', 'student')->count();
        $teacherCount = User::where('role', 'teacher')->count();
        $programCount = Program::count();
        $paymentCount = Payment::count();

        return view('pages.dashboard', compact('studentCount', 'teacherCount' ,'programCount', 'paymentCount'));
    }
}
