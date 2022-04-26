<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Level;
use App\Models\Program;
use App\Models\SppMonth;
use App\Models\Student;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index()
    {
        $programs = Program::get();
        $levels = Level::get();
        $lessons = Lesson::get();
        $spps = Student::where('user_id', auth()->user()->id)->latest()->get();
        return view('pages.home', compact('programs', 'levels', 'lessons', 'spps'));
    }

    public function detail(Request $request, $slug)
    {
        $programs = Program::get();
        $level = Level::where('slug', $slug)->firstOrFail();
        $lessons = $level->lessons()->get();

        return view('pages.resource', compact('programs', 'level', 'lessons'));
    }
}
