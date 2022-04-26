<?php

namespace App\Http\Controllers;

use App\Models\AccountBank;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PaymentPageController extends Controller
{
    public function index()
    {
        $auth = Auth::user()->id;
        $data = Student::where('user_id', $auth)->latest()->get();
        return view('pages.payment', compact('data'));
    }

    public function sppPayment($id)
    {
        $data = Student::findOrFail($id);
        return view('pages.sppPayment', compact('data'));
    }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function sppPaymentStore(Request $request)
    // {
    //     Student::create($request->all());
    //     return redirect()->route('resource');
    // }

    public function sppPaymentDetail($id)
    {
        $data = Student::findOrFail($id);
        $account_banks = AccountBank::get();


        if($data->status == 'unpaid'){
            $data->update([
                'date' => Carbon::now(),
                'dateEnd' => Carbon::now()->addDay(),
                'status' => 'pending',
            ]);
        }

        if($data->status == 'pending' && Carbon::now() >= $data->dateEnd){
            $data->update([
                'status' => 'unpaid',
                'date' => null,
                'dateEnd' => null,
            ]);

            return back()->with('failed', 'the transaction is canceled because it exceeds the transfer time limit !');
        }else{
            return view('pages.sppPaymentDetail', compact('data', 'account_banks'));
        }
        

    }

    public function sppPaymentCancel($id)
    {
        $data = Student::findOrFail($id);

        $data->update([
            'status' => 'unpaid',
            'date' => null,
            'dateEnd' => null,
        ]);

        return view('pages.sppPayment', compact('data'));
    }

    public function sppPaymentSuccess()
    {
        // $data = Student::findOrFail($id);
        return view('pages.paymentSuccess');
    }

}
