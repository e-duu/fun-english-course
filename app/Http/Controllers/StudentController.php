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

class StudentController extends Controller
{
    public function index()
    {
        $data = Program::paginate(10);

        return view('pages.admin.students.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'months' => 'required|max:255',
            'price' => 'required',
            'user_id' => 'required',
            'level_id' => 'required',
            'currency' => 'required',
            'code' => 'nullable',
            'date' => 'nullable',
            'dateEnd' => 'nullable',
        ],
        [
            'months.required' => 'please input recipient month',
            'price.required' => 'please input recipient price',
            'user_id.required' => 'please input recipient student',
            'level_id.required' => 'please input recipient level',
            'currency.required' => 'please input recipient currency',
        ]);

        $code = mt_rand(1,999);

        foreach ($request->months as $month) {
            Student::create([
                'month' => $month,
                'price' => $request->price,
                'code' => $code,
                'user_id' => $request->user_id,
                'level_id' => $request->level_id,
                'currency' => $request->currency,
                'status' => 'unpaid',
            ]);
        }

        $data = Student::latest()->first();
        $yymm = $data->created_at->format('ym');

        if ($data->created_at == date('Y-01-01')) {
            $number = 1;
        }else{
            $num = Invoice::latest()->first();
            if ($num) {
                $number = $num->numberInv+1;
            }else{
                $number = 1;
            }
        }

        Invoice::create([
            'dateCode' => $yymm,
            'numberInv' => $number,
            'student_id' =>$data->id,
        ]);

        return redirect()->route('student.show-spp', $request->level_id);
    }

    public function show($id)
    {
        $data = Program::findorfail($id);
        $users = User::where('role', 'student')->get();
        $levelUsers = LevelUser::with(['level'])->get();
        $getLevels = Level::get();
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
            $spps = Student::whereHas('student', function($query){
                $query->where('name', 'like', '%'. request()->get('name').'%');
            })->where('level_id', $id)->paginate(5);
        } else {
            $spps = Student::where('level_id', $id)->paginate(5);
        }

        // Filter spp by payment status
        if (request()->get('status') != null) {
            $spps = Student::where('status', request()->get('status'))->where('level_id', $id)->paginate(5);
        }

        // Filter spp by month
        if (request()->get('month') != null) {
            $spps = Student::where('month', request()->get('month'))->where('level_id', $id)->paginate(5);
        }

        return view('pages.admin.students.detail-student', compact('data', 'spps', 'students'));
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

        return back()->with('send_invoice_to_mail', 'Invoice berhasil diunggah kepada '.$user->email);
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

                Mail::send($student->status == 'unpaid' ? 'pages.emails.InvoiceMail' : 'pages.emails.ReceiptMail', ['data' => $student], function($message)use($dataEmail, $pdf) {
                    $message->to($dataEmail["email"], $dataEmail["email"])
                        ->subject($dataEmail["title"])
                        ->attachData($pdf->output(), $this->namePdf);
                });
            }
        } catch (\Throwable $th) {
            dd('Send To Mail Failed, check your network again');
        }

        return back()->with('success', 'send mail successfully');
    }
}
