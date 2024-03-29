<?php

namespace App\Http\Controllers;

use App\Mail\InvoiceMail;
use App\Models\Invoice;
use App\Models\Level;
use App\Models\LevelUser;
use App\Models\Program;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;

class StudentController extends Controller
{
    public function index()
    {
        $data = Program::paginate(10);

        return view('pages.admin.students.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'months' => 'required|max:255',
                'year' => 'required',
                'price' => 'required',
                'user_id' => 'required',
                'level_id' => 'required',
                'teacher_id' => 'required',
                'currency' => 'required',
                'code' => 'nullable',
                'date' => 'nullable',
                'dateEnd' => 'nullable',
            ],
            [
                'months.required' => 'please input invoice month',
                'months.required' => 'please input invoice year',
                'price.required' => 'please input invoice price',
                'user_id.required' => 'please input invoice student',
                'level_id.required' => 'please input invoice level',
                'teacher_id.required' => 'please input invoice teacher',
                'currency.required' => 'please input invoice currency',
                'teacher.required' => 'please input invoice teacher',
            ]
        );


        foreach ($request->months as $month) {
            $code = mt_rand(1, 999);

            $student = Student::create([
                'month' => $month,
                'year' => $request->year,
                'price' => $request->price,
                'code' => $code,
                'user_id' => $request->user_id,
                'level_id' => $request->level_id,
                'teacher_id' => $request->teacher_id,
                'currency' => $request->currency,
                'status' => 'unpaid',
            ]);


            $yymm = Carbon::now()->format('ym');

            if (date('Y-m-d') == date('Y-01-01')) {
                $number = 1;
            } else {
                $inv = Invoice::pluck('numberInv')->last();
                if ($inv) {
                    $number = $inv + 1;
                } else {
                    $number = 1;
                }
            }

            Invoice::create([
                'dateCode' => $yymm,
                'numberInv' => $number,
                'student_id' => $student->id,
            ]);
        }


        return redirect()->route('student.show-spp', $request->level_id);
    }

    public function show($id)
    {
        $this->id = $id;
        $data = Program::findorfail($id);
        $users = User::where([['role', 'student'], ['status', 'active']])->get();
        $levelUsers = LevelUser::whereHas('level', function ($query) {
            $query->where('program_id', $this->id);
        })->with(['level'])->get();
        $getLevels = Level::where('program_id', $id)->get();
        $levelsFt = Level::where('program_id', $id)->get();
        if (request()->level == null) {
            $levels = $data->levels()->paginate(10);
        } elseif (request()->level == 'all') {
            $levels = $data->levels()->paginate(10);
        } else {
            $levels = Level::where('id', request()->level)->paginate(1);
        }
        return view('pages.admin.students.detail', compact('data', 'levels', 'levelsFt', 'users', 'levelUsers', 'getLevels'));
    }

    public function sppStudent($id)
    {
        $data = Level::findOrFail($id);

        $students = Student::where('level_id', $id)->get();

        // Search student by name
        if (request()->get('name') != null) {
            $spps = Student::whereHas('student', function ($query) {
                $query->where('name', 'like', '%' . request()->get('name') . '%');
            })->where('level_id', $id)->paginate(5);
        } else {
            $spps = Student::where('level_id', $id)->paginate(5);
        }

        // Filter spp by payment status
        if (request()->get('status') != null) {
            $spps = Student::where('status', request()->get('status'))->where('level_id', $id)->paginate(5);
        } else {
            $spps = Student::where('level_id', $id)->paginate(5);
        }

        // Filter spp by month
        if (request()->get('month') != null) {
            $spps = Student::where('month', request()->get('month'))->where('level_id', $id)->paginate(5);
        } else {
            $spps = Student::where('level_id', $id)->paginate(5);
        }

        return view('pages.admin.students.detail-student', compact('data', 'spps', 'students'));
    }

    public function sendToMailPage($id)
    {
        // Search student by name
        if (request()->get('name') != null) {
            $students = Student::whereHas('student', function ($query) {
                $query->where('name', 'like', '%' . request()->get('name') . '%');
            })->where('level_id', $id)->get();
        } else {
            $students = Student::where('level_id', $id)->get();
        }

        // Filter spp by payment status
        if (request()->get('status') != null) {
            $students = Student::where('status', request()->get('status'))->where('level_id', $id)->get();
        }

        // Filter spp by month
        if (request()->get('month') != null) {
            $students = Student::where('month', request()->get('month'))->where('level_id', $id)->get();
        }

        $data = Level::findOrFail($id);

        return view('pages.admin.students.send-mail-page', compact('data', 'students'));
    }

    public function sppInvoiceMail($userId, $studentId)
    {
        $user = User::findOrFail($userId);
        $student = Student::findOrFail($studentId);

        Mail::to($user->email)->send(new InvoiceMail(
            $user,
            $user->detail,
            $student,
            $student->level->program,
            $student->level,
        ));

        return back()->with('send_invoice_to_mail', 'Invoice berhasil diunggah kepada ' . $user->email);
    }

    public function filterReset(Request $request)
    {
        return redirect()->route('student.show', $request->id);
    }

    public function filterStudentReset(Request $request)
    {
        return redirect()->route('student.show-spp', $request->id);
    }

    // Send To Mail
    public function invorecToMail(Request $request)
    {
        $data = $request->all();

        if ($request->student == null) {
            return back()->with('students must be selected');
        }

        try {
            foreach ($data['student'] as $index => $value) {
                $student = Student::whereId($index)->first();

                $dataEmail["email"] = $student->student->email;
                $dataEmail["title"] = "From Fun English Course";

                if ($student->status == 'unpaid') {
                    $this->namePdf = 'invoice.pdf';
                    $pdf = PDF::loadView('pages.admin.invoice-pdf', ['data' => $student]);
                } else {
                    $this->namePdf = 'receipt.pdf';
                    $pdf = PDF::loadView('pages.admin.receipt-pdf', ['data' => $student]);
                }

                Mail::send($student->status == 'unpaid' ? 'pages.emails.InvoiceMail' : 'pages.emails.ReceiptMail', ['data' => $student], function ($message) use ($dataEmail, $pdf) {
                    $message->to($dataEmail["email"], $dataEmail["email"])
                        ->subject($dataEmail["title"])
                        ->attachData($pdf->output(), $this->namePdf);
                });
            }
        } catch (\Throwable $th) {
            dd('Send To Mail Failed, come back to check your network again');
        }

        return back()->with('success', 'send mail successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Student::find($id);
        $this->data = $data;
        $users = User::where('role', 'student')->get();
        $levelUsers = LevelUser::whereHas('level', function ($query) {
            $query->where('program_id', $this->data->level->program_id);
        })->with(['level'])->get();
        $getLevels = Level::where('program_id', $data->level->program_id)->get();
        $levelsFt = Level::where('program_id', $data->level->program_id)->get();
        return view('pages.admin.students.edit', compact('data', 'users', 'levelUsers', 'getLevels', 'levelsFt'));
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
        $request->validate(
            [
                'price' => 'required',
                'currency' => 'required',
            ],
            [
                'price.required' => 'please input recipient price',
                'currency.required' => 'please input recipient currency',
            ]
        );


        $student = Student::findOrFail($id);

        $student->update([
            'price' => $request->price,
            'currency' => $request->currency,
        ]);

        return redirect()->route('student.show-spp', $student->level->program_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Student::find($id);

        $data->invoice()->delete();

        $data->delete();

        return back();
    }
}
