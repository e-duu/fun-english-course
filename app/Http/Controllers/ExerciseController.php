<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\Lesson;
use App\Models\Question;
use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data = Lesson::findOrFail($id);
        return view('pages.admin.exercises.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'photo_file' => 'required',
        ],
        [
            'title.required' => 'please input exercise title',
            'photo_file.required' => 'please input exercise photo',
        ]);
        
        $image = $request->file('photo_file');
        $new_name_image = time() . '.' .  $image->getClientOriginalExtension();
        $image->move(public_path('exercises'), $new_name_image);
        $request->merge([
            'photo' => $new_name_image
        ]);

        Exercise::create($request->all());
        return redirect()->route('lesson.show', $request->lesson_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Exercise::findOrFail($id);
        return view('pages.admin.exercises.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Exercise::findOrFail($id);
        return view('pages.admin.exercises.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required',
        ];

        $item = Exercise::find($id);

        if (!empty($request->photo_file)) {
            $image = $request->file('photo_file');
            $new_name_image = time() . '.' .  $image->getClientOriginalExtension();
            $image->move(public_path('exercises'), $new_name_image);
            $request->merge([
                'photo' => $new_name_image
            ]);
            
            $img_path = public_path('exercises/' . $item->photo);
            if (file_exists($img_path)) {
                unlink($img_path);
            }

            $data = $request->all();
        } else {
            $data = $request->except('photo');
        }

        $request->validate($rules);

        $item->update($data);
        
        return redirect()->route('lesson.show', $request->lesson_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\
     */
    public function destroy($id)
    {
        $data = Exercise::findorfail($id);
        $data->delete();
        $this->removeImage($data->image);
        return back();
    }

    public function score(Request $request, $id)
    {
        $answer = $request->input('answer');
        
        $correct_answer = null;
        $wrong_answer = null;

        foreach ($answer as $key => $value) {
            $check = Question::where('id','=', $key)->where('answer','=',$value)->get();
            $correct = count($check);
            
            if($correct){
                $correct_answer++;
            } else {
                $wrong_answer++;
            }
        }

        $total_question = Exercise::find($id)->questions()->count(); 
        
        $score = $correct_answer / $total_question * 100;

        Score::create([
            'user_id' => Auth::user()->id,
            'score' => $score,
        ]);

        return redirect()->route('score');
        
    }
}
