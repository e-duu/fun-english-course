<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Level;
use App\Models\Material;
use App\Models\Program;
use App\Models\User;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index()
    {
        $programs = Program::all();
        $levels = Level::all();
        $lessons = Lesson::all();
        $materials = Material::all();
        $users = User::all();
        return view('pages.resources', compact('programs', 'levels', 'lessons', 'materials', 'users'));
    }
}
