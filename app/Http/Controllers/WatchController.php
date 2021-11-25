<?php

namespace App\Http\Controllers;

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
    public function index($lessonId, $materialId)
    {
      $materials = Material::where('lesson_id', $lessonId)->find($materialId);
      $lessons = Lesson::find($lessonId);
      return view('pages.watch', compact('materials', 'lessons'));
    }

}
