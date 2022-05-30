<?php

namespace App\Http\Controllers;

use App\Mail\MyMail;
use App\Models\SppPayment;
use App\Models\Student;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
        $data = Student::findOrFail($id);

        // Price
        $price = $data->price;

        // Purchase Units
        $description = '$' . $price . ' total spp price';

        $item = $provider->createOrder([
            'intent' => 'CAPTURE',
            'purchase_units' => [
                [
                    "description" => "Pembayaran SPP",
                    "custom_id" => "CUST-".Str::random(7),
                    "soft_descriptor" => "Pembayaran SPP",
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $price,
                        "breakdown" => [
                            "item_total" => [
                                "currency_code" => "USD",
                                "value" => $price
                            ],
                        ]
                    ],
                    "items" => [
                        [
                            "name" => "Pembayaran SPP",
                            "sku" => "sku".Str::random(7),
                            "description" => "SPP Month".$data->month."-".$data->year,
                            "unit_amount" => [
                                "currency_code" => "USD",
                                "value" => $price
                            ],
                            "tax" => [
                                "currency_code" => "USD",
                                "value" => "00"
                            ],
                            "quantity" => "1",
                            "category" => "PHYSICAL_GOODS"
                        ],
                    ],
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
        $student = Student::findOrFail($id);
        $user = User::findOrFail($student->user_id);

        // Init Paypal
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $token = $provider->getAccessToken();
        $provider->getAccessToken($token);

        $result = $provider->capturePaymentOrder($orderId);

        // Convert IDR to USD
        $price = $student->price;

        // movement to Database (Import & Update)
        $sppPayment = SppPayment::create([
            'currency' => 'USD',
            'amount' => $price,
            'user_id' => $student->user_id,
            'student_id' => $student->id,
            'orderId' => $orderId,
        ]);
        $student->update([
            'status' => 'paid',
            'code' => null,
            'updated_at' => Carbon::now(),
        ]);

        // Send To Mail
        Mail::to($user->email)->send(new MyMail(
            $student,
            $sppPayment,
            $student->level->program,
            $student->level,
            $user,
        ));

        return response()->json($result);
    }

    public function payManually($id)
    {
        $data = Student::findOrFail($id);
        return view('pages.admin.students.pay-manually', compact('data'));
    }

    public function payManuallyProsses(Request $request, $id)
    {
        $data = Student::findOrFail($id);

        SppPayment::create([
            'amount' => $data->price,
            'currency' => $data->currency,
            'orderId' => rand(1000000000, 9999999999),
            'user_id' => $data->user_id,
            'student_id' => $data->id,
        ]);
        $data->update([
            'status' => 'paid_manually',
            'code' => null,
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->route('student.show-spp', $data->level_id);
    }

    // public function sppInvoiceMail($userId, $studentId)
    // {
    //     $user = User::findOrFail($userId);
    //     $student = Student::findOrFail($studentId);

    //     Mail::to($user->email)->send(new InvoiceMail(
    //         $user,
    //         $student,
    //         $student->level->program,
    //         $student->level,
    //     ));

    //     return back()->with('send_invoice_to_mail', 'Invoice berhasil diunggah kepada '.$user->email);
    // }
}
