<?php

namespace App\Http\Controllers;

use App\Models\Downloadable;
use App\Models\Lesson;
use Illuminate\Http\Request;

class DownloadableController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data = Lesson::findOrFail($id);
        return view('pages.admin.downloadables.create', compact('data'));
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
            'description' => 'required',
            'download_file' => 'required',
            'photo_file' => 'required',
        ],
        [
            'title.required' => 'please input downloadable file title',
            'description.required' => 'please input downloadable file description',
            'download_file.required' => 'please input downloadable file content',
            'photo_file.required' => 'please input downloadable file photo',
        ]);
        
        $image = $request->file('photo_file');
        $new_name_image = time() . '.' .  $image->getClientOriginalExtension();
        $image->move(public_path('downloadables'), $new_name_image);
        $request->merge([
            'photo' => $new_name_image
        ]);

        $content = $request->file('download_file');
        $new_name_content = time() . '.' .  $content->getClientOriginalExtension();
        $content->move(public_path('downloadables'), $new_name_content);
        $request->merge([
            'file' => $new_name_content
        ]);

        Downloadable::create($request->all());
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
        $data = Downloadable::findOrFail($id);
        return view('pages.admin.downloadables.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Downloadable::findOrFail($id);
        return view('pages.admin.downloadables.edit', compact('data'));
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
            'description' => 'required',
        ];

        $item = Downloadable::find($id);

        if (!empty($request->photo_file)) {
            $image = $request->file('photo_file');
            $new_name_image = time() . '.' .  $image->getClientOriginalExtension();
            $image->move(public_path('downloadables'), $new_name_image);
            $request->merge([
                'photo' => $new_name_image
            ]);
            
            $img_path = public_path('downloadables/' . $item->photo);
            if (file_exists($img_path)) {
                unlink($img_path);
            }

            $data = $request->all();
        } else {
            $data = $request->except('photo');
        }

        if (!empty($request->download_file)) {
            $content = $request->file('download_file');
            $new_name_content = time() . '.' .  $content->getClientOriginalExtension();
            $content->move(public_path('downloadables'), $new_name_content);
            $request->merge([
                'file' => $new_name_content
            ]);

            $data = $request->all();
        } else {
            $data = $request->except('file');
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
        $data = Downloadable::findorfail($id);
        $data->delete();
        return back();
    }
}
