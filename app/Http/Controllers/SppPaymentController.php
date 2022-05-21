<?php

namespace App\Http\Controllers;

use App\Mail\InvoiceMail;
use App\Mail\MyMail;
use App\Models\SppPayment;
use App\Models\Student;
use App\Models\User;
use Carbon\Carbon;
use Exception;
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

        // Convert IDR to USD
        $price = $this->convertToDollar($data->price);

        // Purchase Units
        $description = '$' . $price . ' total spp price';

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
        $student = Student::findOrFail($id);
        $user = User::findOrFail($student->user_id);

        // Init Paypal
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $token = $provider->getAccessToken();
        $provider->getAccessToken($token);

        $result = $provider->capturePaymentOrder($orderId);

        // Convert IDR to USD
        $price = $this->convertToDollar($student->price);

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

    public function convertToDollar($price)
    {
        // Convertion IDR to USD
        $req_url = "https://v6.exchangerate-api.com/v6/4de7938f23bbd34918b9c82c/latest/IDR";
        $response_json = file_get_contents($req_url);
        if (false !== $response_json) {
            try {
                $response = json_decode($response_json);
                if ('success' === $response->result) {
                    $base_price = $price;
                    $result = round(($base_price * $response->conversion_rates->USD), 2);
                }
            } catch (Exception $e) {
                dd('Convertion Failed!');
            }
        }

        return $result;
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
