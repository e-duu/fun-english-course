<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Payment;
use App\Models\Program;
use App\Models\Recipient;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentPageController extends Controller
{
    public function index()
    {
        $users = User::all();
        $recipients = Recipient::all();
        $programs = Program::all();
        $levels = Level::all();

        return view('pages.payment', compact('users', 'recipients', 'programs', 'levels'));
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
        return redirect()->route('resource');
    }
}
