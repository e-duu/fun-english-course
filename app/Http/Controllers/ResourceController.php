<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Level;
use App\Models\Program;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index()
    {
        $programs = Program::get();
        $levels = Level::get();
        $lessons = Lesson::get();
        return view('pages.home', compact('programs', 'levels', 'lessons'));
    }

    public function detail(Request $request, $slug)
    {
        $programs = Program::get();
        $levels = Level::get();
        $level = Level::where('slug', $slug)->firstOrFail();
        $lessons = $level->lessons()->get();

        return view('pages.resource', compact('programs' ,'levels', 'level', 'lessons'));
    }
}
