<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LevelController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data = Program::findOrfail($id);
        return view('pages.admin.levels.create', compact('data'));
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
            'name' => 'required|max:255',
        ],
        [
            'name.required' => 'please input level name',
        ]);
        
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        Level::create($data);
        return redirect()->route('program.show', $request->program_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Level::findorfail($id);
        $lessons = $data->lessons()->paginate(5);
        return view('pages.admin.levels.detail', compact('data', 'lessons'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Level::find($id);
        return view('pages.admin.levels.edit', compact('data'));
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
        $request->validate([
            'name' => 'required|max:255',
        ],
        [
            'name.required' => 'please input level name',
        ]);
        
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        Level::find($id)->update($data);

        return redirect()->route('program.show', $request->program_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Level::find($id);
        $data->delete();
        return back();
    }
}
