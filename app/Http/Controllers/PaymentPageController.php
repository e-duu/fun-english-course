<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Payment;
use App\Models\Program;
use App\Models\Recipient;
use App\Models\SppMonth;
use Illuminate\Http\Request;

class PaymentPageController extends Controller
{
    public function index()
    {
        $recipients = Recipient::all();
        $programs = Program::all();
        $levels = Level::all();

        return view('pages.payment', compact('recipients', 'programs', 'levels'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('photo_file');
        $new_name_image = time() . '.' .  $image->getClientOriginalExtension();
        $image->move(public_path('payments'), $new_name_image);
        $request->merge([
            'evidence' => $new_name_image
        ]);
        Payment::create($request->all());
        return redirect()->route('resource');
    }

    public function sppPayment($id)
    {
        $data = SppMonth::findOrFail($id);
        return view('pages.sppPayment', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sppPaymentStore(Request $request)
    {
        Payment::create($request->all());
        return redirect()->route('resource');
    }

    public function sppPaymentDetail($id)
    {
        $data = SppMonth::findOrFail($id);
        return view('pages.sppPaymentDetail', compact('data'));
    }
}
