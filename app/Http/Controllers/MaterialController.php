<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
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
        $data = Lesson::findorfail($id);
        return view('pages.admin.materials.create', compact('data'));
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
            'content' => 'required',
            'photo_file' => 'required',
        ],
        [
            'title.required' => 'please input material title',
            'content.required' => 'please input material content',
            'photo_file.required' => 'please input material photo',
        ]);
        
        $image = $request->file('photo_file');
        $new_name_image = time() . '.' .  $image->getClientOriginalExtension();
        $image->move(public_path('materials'), $new_name_image);
        $request->merge([
            'photo' => $new_name_image
        ]);
        Material::create($request->all());
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
        $data = Material::findorfail($id);
        return view('pages.admin.materials.detail', compact('data'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Material::find($id);
        return view('pages.admin.materials.edit', compact('data'));
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
            'content' => 'required',
        ];

        $item = Material::find($id);

        if (!empty($request->photo_file)) {
            $image = $request->file('photo_file');
            $new_name_image = time() . '.' .  $image->getClientOriginalExtension();
            $image->move(public_path('materials'), $new_name_image);
            $request->merge([
                'photo' => $new_name_image
            ]);
            
            $img_path = public_path('materials/' . $item->photo);
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
        $data = Material::findorfail($id);
        $data->delete();
        $this->removeImage($data->image);
        return back();
    }

}

// auth()->user()->levels()->where()->get()