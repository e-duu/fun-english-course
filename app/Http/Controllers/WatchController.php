<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\Lesson;
use App\Models\Material;
use App\Models\Score;
use Illuminate\Support\Facades\Auth;

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

      $nextMaterial = $material->lesson
        ->materials()
        ->where('id', '>', $id)
        ->orderBy('id')
        ->first();

      $nextExercise = $material->lesson
        ->exercises()
        ->first();

      if ($nextMaterial) {
        $next = route('watch', $nextMaterial->id);
      } else if ($nextExercise) {
        $next = route('exercise', $nextExercise->id);
      } else {
        $next = null;
      }
      
      $lessons = Lesson::where('level_id', $material->lesson->level_id)->get();
      return view('pages.watch', compact('material', 'lessons', 'next'));
    }
    
    public function exercise($id)
    {
      $exercise = Exercise::find($id);

      $nextExercise = $exercise->lesson
        ->exercises()
        ->where('id', '>', $id)
        ->orderBy('id')
        ->first();

      $nextMaterial = $exercise->lesson
        ->exercises()
        ->first();

      if ($nextExercise) {
        $next = route('exercise', $nextExercise->id);
      } else if ($nextExercise) {
        $next = route('watch', $nextMaterial->id);
      } else {
        $next = null;
      }
      
      $lessons = Lesson::where('level_id', $exercise->lesson->level_id)->get();
      return view('pages.exercise', compact('exercise', 'lessons', 'next'));
    }

    public function score()
    {
      $data = Score::where('user_id', '=', auth()->user()->id)->orderBy('created_at', 'desc')->first();
      
      return view('pages.score', compact('data'));
    }

}
