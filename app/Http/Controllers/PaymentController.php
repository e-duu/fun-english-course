<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Material;
use App\Models\Payment;
use App\Models\Program;
use App\Models\Recipient;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Payment::paginate(5);
        return view('pages.admin.payments.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $programs = Program::all();
        $levels = Level::all();
        $recipients = Recipient::all();

        return view('pages.admin.payments.create', compact('users', 'programs', 'levels', 'recipients'));
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
            'user_id' => 'required|integer',
            'program_id' => 'required|integer',
            'level_id' => 'required|integer',
            'recipient_id' => 'required|integer',
            'amount' => 'required|integer',
            'note' => 'required',
        ],
        [
            'user_id.required' => 'please select user',
            'program_id.required' => 'please select program',
            'level_id.required' => 'please select level',
            'reciepient_id.required' => 'please select recipient bank',
            'amount.required' => 'please input amount',
            'note.required' => 'please input notes',
        ]);
        
        $image = $request->file('photo_file');
        $new_name_image = time() . '.' .  $image->getClientOriginalExtension();
        $image->move(public_path('payments'), $new_name_image);
        $request->merge([
            'evidence' => $new_name_image
        ]);
        Payment::create($request->all());
        return redirect()->route('payment.all');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Payment::findorfail($id);

        return view('pages.admin.payments.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payments = Payment::findorfail($id);
        $users = User::all();
        $programs = Program::all();
        $levels = Level::all();
        $recipients = Recipient::all();

        return view('pages.admin.payments.edit', compact('payments', 'users', 'programs', 'levels', 'recipients'));
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
            'user_id' => 'required|integer',
            'program_id' => 'required|integer',
            'level_id' => 'required|integer',
            'recipient_id' => 'required|integer',
            'amount' => 'required|integer',
            'note' => 'required',
        ];

        $item = Payment::find($id);

        if (!empty($request->photo_file)) {
            $image = $request->file('photo_file');
            $new_name_image = time() . '.' .  $image->getClientOriginalExtension();
            $image->move(public_path('payments'), $new_name_image);
            $request->merge([
                'evidence' => $new_name_image
            ]);
            
            $img_path = public_path('payments/' . $item->evidence);
            if (file_exists($img_path)) {
                unlink($img_path);
            }

            $data = $request->all();
        } else {
            $data = $request->except('evidence');
        }

        $request->validate($rules);

        $item->update($data);
        
        return redirect()->route('payment.all');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Payment::findorfail($id);
        $data->delete();
        $this->removeImage($data->image);
        return back();
    }

    public function removeImage($image)
    {
        if (file_exists($image)) {
            unlink('storage/' . $image);
        }
    }
}
