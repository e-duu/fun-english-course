<?php

namespace App\Http\Controllers;

use App\Models\Level;
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
        $data = Payment::all();
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
        $data = request()->all();
        $data['evidence'] = $request->file('evidence')->store('assets/payments', 'public');
        Payment::create($data);
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
        $data = Payment::finorfail($id);

        return view('pages.admin.payments.create', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payments = Payment::finorfail($id);
        $users = User::all();
        $programs = Program::all();
        $levels = Level::all();
        $recipients = Recipient::all();

        return view('pages.admin.payments.create', compact('payments', 'users', 'programs', 'levels', 'recipients'));
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
        $data = $request->all();
        $data['evidence'] = $request->file('evidence')->store('assets/payments', 'public');
        $item = Payment::findOrFail($id);
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
