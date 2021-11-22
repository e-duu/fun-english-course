<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Material;
use Illuminate\Http\Request;

class WatchController extends Controller
{
    public function index()
    {
        $lessons = Lesson::all();
        $materials = Material::all();
        return view('pages.watch');
    }
}
