<?php

namespace App\Http\Controllers;

use App\Models\SppMonth;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class SppPaymentController extends Controller
{
    public function createPayment($id)
    {
        // Init PayPal
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $token = $provider->getAccessToken();
        $provider->getAccessToken($token);

        // From Database
        $data = SppMonth::findOrFail($id);

        // Purchase Units
        $price = $data->price;
        $description = '$'.$data->price.' spp price';

        $provider->createOrder([
            'intent' => 'CAPTURE',
            'purchase_units' => [
                [
                    'amount' => [
                        'currency_code' => 'USD',
                        'value' => $price
                    ],
                    'description' => $description,
                ],
            ],
        ]);
    }

    public function capturePayment(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $orderId = $data['orderId'];

        // Init Paypal
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $token = $provider->getAccessToken();
        $provider->getAccessToken($token);

        $result = $provider->capturePaymentOrder($orderId);

        // Update to Database

        return response()->json($result);
    }
}
