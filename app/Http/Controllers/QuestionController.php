<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\Question;
use App\Models\QuestionUser;
use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Question\Question as QuestionQuestion;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Question::paginate(5);
        return view('pages.admin.questions.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data = Exercise::findOrFail($id);
        return view('pages.admin.questions.create', compact('data'));
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
            'question' => 'required',
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
            'answer' => 'required',
            'photo_file' => 'required',
            'exercise_id' => 'required',
        ],
        [
            'question.required' => 'please input your name',
            'a.required' => 'please input the answer',
            'b.required' => 'please input the answer',
            'c.required' => 'please input the answer',
            'd.required' => 'please input the answer',
            'answer.required' => 'please select the correct answer',
            'photo_file.required' => 'please insert your question photo',

        ]);

        $image = $request->file('photo_file');
        $new_name_image = time() . '.' .  $image->getClientOriginalExtension();
        $image->move(public_path('questions'), $new_name_image);
        $request->merge([
            'photo' => $new_name_image
        ]);
        Question::create($request->all());
        return redirect()->route('exercise.show', $request->exercise_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Question::findOrFail($id);
        return view('pages.admin.questions.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Question::findOrFail($id);
        return view('pages.admin.questions.edit', compact('data'));
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
            'question' => 'required',
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
            'answer' => 'required',
        ];

        $item = Question::find($id);

        if (!empty($request->photo_file)) {
            $image = $request->file('photo_file');
            $new_name_image = time() . '.' .  $image->getClientOriginalExtension();
            $image->move(public_path('questions'), $new_name_image);
            $request->merge([
                'photo' => $new_name_image
            ]);
            
            $img_path = public_path('questions/' . $item->photo);
            if (file_exists($img_path)) {
                unlink($img_path);
            }

            $data = $request->all();
        } else {
            $data = $request->except('photo');
        }

        $request->validate($rules);

        $item->update($data);
        
        return redirect()->route('exercise.show', $request->exercise_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Question::find($id);

        $data->delete();

        return back();
    }

}
