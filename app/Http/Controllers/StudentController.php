<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Program;
use App\Models\SppMonth;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Program::paginate(10);
        return view('pages.admin.students.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Program::findorfail($id);
        $levels = $data->levels()->paginate(10);
        return view('pages.admin.students.detail', compact('data', 'levels'));
    }
    
    public function sppStudent($id)
    {
        $data = Level::findOrFail($id);
        $spps = SppMonth::where('level_id', $id)->get();
        
        return view('pages.admin.students.detail-student', compact('data', 'spps'));
    }

}
