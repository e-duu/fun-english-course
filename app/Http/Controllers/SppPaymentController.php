<?php

namespace App\Http\Controllers;

use App\Models\SppMonth;
use App\Models\SppPayment;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class SppPaymentController extends Controller
{
    // public function index()
    // {
    //     return view('pages.test');
    // }

    // public function create(Request $request)
    // {
    //     // $data = json_decode($request->getContent(), true);

    //     // Init PayPal
    //     $provider = new PayPalClient;
    //     $provider->setApiCredentials(config('paypal'));
    //     $token = $provider->getAccessToken();
    //     $provider->getAccessToken($token);

    //     // From Database

    //     // Dami
    //     $price = '10.00';
    //     $description = '$10 Spp';

    //     $spp = $provider->createOrder([
    //         'intent' => 'CAPTURE',
    //         'purchase_units' => [
    //             [
    //                 'amount' => [
    //                     'currency_code' => 'USD',
    //                     'value' => $price
    //                 ],
    //                 'description' => $description,
    //             ],
    //         ],
    //     ]);

    //     return response()->json($spp);
    // }

    // public function capture(Request $request)
    // {
    //     $data = json_decode($request->getContent(), true);
    //     $orderId = $data['orderId'];

    //     // Init Paypal
    //     $provider = new PayPalClient;
    //     $provider->setApiCredentials(config('paypal'));
    //     $token = $provider->getAccessToken();
    //     $provider->getAccessToken($token);

    //     $result = $provider->capturePaymentOrder($orderId);

    //     // Update to Database

    //     return response()->json($result);
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.sppPayments.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $spps = SppMonth::all();
        return view('pages.admin.sppPayments.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = SppPayment::findOrFail($id);
        return view('pages.admin.sppPayments.edit', compact('data'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
