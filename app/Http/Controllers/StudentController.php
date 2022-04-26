<?php

namespace App\Http\Controllers;

use App\Mail\InvoiceMail;
use App\Models\Level;
use App\Models\Program;
use App\Models\SppMonth;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $levelsFt = Level::where('program_id', $id)->get();
        if (request()->level == null) {
            $levels = $data->levels()->paginate(10);
        } else {
            $levels = Level::where('id', request()->level)->paginate(1);
        }
        return view('pages.admin.students.detail', compact('data', 'levels', 'levelsFt'));
    }

    public function sppStudent($id)
    {
        $data = Level::findOrFail($id);
        $spps = Student::where('level_id', $id)->get();

        return view('pages.admin.students.detail-student', compact('data', 'spps'));
    }

    public function sppInvoiceMail($userId, $sppMonthId)
    {
        $user = User::findOrFail($userId);
        $sppMonth = Student::findOrFail($sppMonthId);

        Mail::to($user->email)->send(new InvoiceMail(
            $user,
            $user->detail,
            $sppMonth,
            $sppMonth->level->program,
            $sppMonth->level,
        ));

        return back()->with('send_invoice_to_mail', 'Invoice berhasil diunggah kepada '.$user->email);
    }

}
