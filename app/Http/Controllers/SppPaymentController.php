<?php

namespace App\Http\Controllers;

use App\Mail\MyMail;
use App\Models\SppMonth;
use App\Models\SppPayment;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Throwable;

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

        // Convert IDR to USD
        $price = $this->convertToDollar($data->price);

        // Purchase Units
        $description = '$'.$price.' total spp price';

        $item = $provider->createOrder([
            'intent' => 'CAPTURE',
            'purchase_units' => [
                [
                    'amount' => [
                        'currency_code' => 'USD',
                        'value' => $price,
                    ],
                    'description' => $description,
                ],
            ],
        ]);

        // database movement
        $data->update([
            'status' => 'unpaid',
        ]);

        return response()->json($item);
    }

    public function capturePayment(Request $request, $id)
    {
        $data = json_decode($request->getContent(), true);
        $orderId = $data['orderId'];

        // From Database
        $sppMonth = SppMonth::findOrFail($id);
        $user = User::findOrFail($sppMonth->user_id);

        // Init Paypal
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $token = $provider->getAccessToken();
        $provider->getAccessToken($token);

        $result = $provider->capturePaymentOrder($orderId);

        // Convert IDR to USD
        $price = $this->convertToDollar($sppMonth->price);

        // movement to Database (Import & Update)
        $sppPayment = SppPayment::create([
            'currency' => 'USD',
            'amount' => $price,
            'user_id' => $sppMonth->user_id,
            'spp_month_id' => $sppMonth->id,
            'orderId' => $orderId,
        ]);
        $sppMonth->update([
            'status' => 'paid',
            'updated_at' => Carbon::now(),
        ]);

        // Send To Mail
        Mail::to($user->email)->send(new MyMail(
            $sppMonth,
            $sppPayment,
            $sppMonth->level->program,
            $sppMonth->level,
            $user,
        ));

        return response()->json($result);
    }

    public function convertToDollar($price)
    {
        // Convertion IDR to USD
        $req_url = "https://v6.exchangerate-api.com/v6/4de7938f23bbd34918b9c82c/latest/IDR";
        $response_json = file_get_contents($req_url);
        if(false !== $response_json) {
            try {
                $response = json_decode($response_json);
                    if('success' === $response->result) {
                        $base_price = $price;
                        $result = round(($base_price * $response->conversion_rates->USD), 2);
                    }
                }
            catch(Exception $e) {
                dd('Convertion Failed!');
            }
        }

        return $result;
    }
}
