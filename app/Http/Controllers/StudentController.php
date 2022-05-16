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

class StudentController extends Controller
{
    public function index()
    {
        $data = Program::paginate(10);
        $users = User::where('role', 'student')->get();
        $levelUsers = LevelUser::with(['level'])->get();
        $levels = Level::get();

        return view('pages.admin.students.index', compact('data', 'users', 'levelUsers', 'levels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'months' => 'required|max:255',
            'price' => 'required',
            'user_id' => 'required',
            'level_id' => 'required',
            'code' => 'nullable',
            'date' => 'nullable',
            'dateEnd' => 'nullable',
        ],
        [
            'months.required' => 'please input recipient month',
            'price.required' => 'please input recipient price',
            'user_id.required' => 'please input recipient student',
            'level_id.required' => 'please input recipient level',
        ]);

        $code = mt_rand(1,999);
        // dd($code);

        foreach ($request->months as $month) {
            Student::create([
                'month' => $month,
                'price' => $request->price,
                'code' => $code,
                'user_id' => $request->user_id,
                'level_id' => $request->level_id,
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
        $levelsFt = Level::where('program_id', $id)->get();
        if (request()->level == null) {
            $levels = $data->levels()->paginate(10);
        } elseif (request()->level == 'all') {
            $levels = $data->levels()->paginate(10);
        } else {
            $levels = Level::where('id', request()->level)->paginate(1);
        }
        return view('pages.admin.students.detail', compact('data', 'levels', 'levelsFt'));
    }

    public function sppStudent($id)
    {
        $data = Level::findOrFail($id);
        $spps = Student::where('level_id', $id)->paginate(5);

        return view('pages.admin.students.detail-student', compact('data', 'spps'));
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
}
