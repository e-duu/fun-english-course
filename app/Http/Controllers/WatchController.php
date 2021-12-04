<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\Lesson;
use App\Models\Material;

class WatchController extends Controller
{
  /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
      $material = Material::find($id);
      $next = Lesson::where('level_id', $material->lesson->level_id)->orderBy('id', 'desc')->get();
      $lessons = Lesson::where('level_id', $material->lesson->level_id)->get();
      return view('pages.watch', compact('material', 'lessons', 'next'));
    }
    
    public function exercise($id)
    {
      $exercise = Exercise::find($id);
      $lessons = Lesson::where('level_id', $exercise->lesson->level_id)->get();
      return view('pages.exercise', compact('exercise', 'lessons'));
    }

}
