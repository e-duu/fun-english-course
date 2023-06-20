<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Transaction;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;

class TransactionController extends Controller
{
    // public function createInvoice1(Request $request, $student_id)
    // {
    //     // SAMPLE HIT API iPaymu v2 PHP //

    //     $va           = '0000005747245474'; //get on iPaymu dashboard
    //     $apiKey       = 'SANDBOX63A5AE9A-66D0-42A7-B9BD-69EEB2A2085D'; //get on iPaymu dashboard

    //     $url          = 'https://sandbox.ipaymu.com/api/v2/payment'; // for development mode
    //     // $url          = 'https://my.ipaymu.com/api/v2/payment'; // for production mode

    //     $method       = 'POST'; //method

    //     //student spp
    //     $student = Student::findOrFail($student_id);
    //     if ($student->month == 1) {
    //         $month = 'January';
    //     } else if ($student->month == 2) {
    //         $month = 'February';
    //     } elseif ($student->month == 3) {
    //         $month = 'March';
    //     } elseif ($student->month == 4) {
    //         $month = 'April';
    //     } elseif ($student->month == 5) {
    //         $month = 'May';
    //     } elseif ($student->month == 6) {
    //         $month = 'June';
    //     } elseif ($student->month == 7) {
    //         $month = 'July';
    //     } elseif ($student->month == 8) {
    //         $month = 'August';
    //     } elseif ($student->month == 9) {
    //         $month = 'September';
    //     } elseif ($student->month == 10) {
    //         $month = 'October';
    //     } elseif ($student->month == 11) {
    //         $month = 'November';
    //     } elseif ($student->month == 12) {
    //         $month = 'December';
    //     }

    //     //Request Body//
    //     $body['product']    = array($student->level->program->name . ' | ' . $student->level->name);
    //     $body['qty']        = array('1');
    //     $body['price']      = array($student->price);
    //     $body['description'] = array($month . ' ' . $student->year);
    //     $body['returnUrl']  = route('spp-payment', $student->id);
    //     $body['cancelUrl']  = route('spp-payment', $student->id);
    //     $body['notifyUrl']  = route('callbackIpaymu');
    //     $body['referenceId'] = '1234'; //your reference id
    //     //End Request Body//

    //     //Generate Signature
    //     // *Don't change this
    //     $jsonBody     = json_encode($body, JSON_UNESCAPED_SLASHES);
    //     $requestBody  = strtolower(hash('sha256', $jsonBody));
    //     $stringToSign = strtoupper($method) . ':' . $va . ':' . $requestBody . ':' . $apiKey;
    //     $signature    = hash_hmac('sha256', $stringToSign, $apiKey);
    //     $timestamp    = Date('YmdHis');
    //     //End Generate Signature


    //     $ch = curl_init($url);

    //     $headers = array(
    //         'Accept: application/json',
    //         'Content-Type: application/json',
    //         'va: ' . $va,
    //         'signature: ' . $signature,
    //         'timestamp: ' . $timestamp
    //     );

    //     curl_setopt($ch, CURLOPT_HEADER, false);
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    //     curl_setopt($ch, CURLOPT_POST, count($body));
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonBody);

    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //     curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    //     $err = curl_error($ch);
    //     $ret = curl_exec($ch);
    //     curl_close($ch);

    //     // dd($ret);

    //     if ($err) {
    //         echo $err;
    //     } else {

    //         //Response
    //         $ret = json_decode($ret);
    //         if ($ret->Status == 200) {
    //             $sessionId  = $ret->Data->SessionID;
    //             $url        =  $ret->Data->Url;
    //             header('Location:' . $url);

    //             $student->update([
    //                 'status' => 'pending'
    //             ]);

    //             $transaction = Transaction::create([
    //                 'session_id' => $sessionId,
    //                 'url' => $url,
    //                 'student_id' => $student->id
    //             ]);

    //             return redirect($ret->Data->Url);
    //         } else {
    //             echo $ret;
    //         }
    //         //End Response
    //     }
    // }

    // public function callbackIpaymu(Request $request)
    // {
    //     $sid  = $request->sid;
    //     $transaction = Transaction::where('session_id', $sid)->first();

    //     if ($transaction) {
    //         $dateString = Carbon::now();
    //         $dateNew = new DateTime($dateString);
    //         $date = $dateNew->format('Y-m-d H:i:s');

    //         $transaction->update([
    //             'status' => $request->sid,
    //             'trx_id' => $request->trx_id,
    //             'payment_method' => $request->via,
    //             'pay_on' => $date,
    //         ]);

    //         $student = Student::findOrFail($transaction->student_id);
    //         $student->update([
    //             'status' => 'paid'
    //         ]);

    //         return $transaction;
    //     } else {
    //         return 'tidak ada transaksi yang sesuai';
    //     }
    // }

    public function createInvoice(Request $request, $student_id)
    {
        //student spp
        $student = Student::findOrFail($student_id);
        if ($student->month == 1) {
            $month = 'January';
        } else if ($student->month == 2) {
            $month = 'February';
        } elseif ($student->month == 3) {
            $month = 'March';
        } elseif ($student->month == 4) {
            $month = 'April';
        } elseif ($student->month == 5) {
            $month = 'May';
        } elseif ($student->month == 6) {
            $month = 'June';
        } elseif ($student->month == 7) {
            $month = 'July';
        } elseif ($student->month == 8) {
            $month = 'August';
        } elseif ($student->month == 9) {
            $month = 'September';
        } elseif ($student->month == 10) {
            $month = 'October';
        } elseif ($student->month == 11) {
            $month = 'November';
        } elseif ($student->month == 12) {
            $month = 'December';
        }

        $fees = [];
        $amount =  $student->price;
        $desc = $student->level->program->name . ' | ' . $student->level->name . ' | ' . $month . ' ' . $student->year;

        $num = (str_pad((int)$student->invoice->numberInv, 8, '0', STR_PAD_LEFT));
        $inv = 'INV-' . $student->invoice->dateCode . $num;

        $external_id = Str::random(10);

        // $params = [
        //     'external_id' => $inv,
        //     'payer_email' => auth()->user()->email,
        //     'description' => $desc,
        //     'amount' => $amount,
        //     'invoice_duration' => 86400,
        //     'customer' => [
        //         'given_names' => 'John',
        //         'surname' => 'Doe',
        //         'email' => 'johndoe@example.com',
        //         'mobile_number' => '+6287774441111',
        //         'addresses' => [
        //             [
        //                 'city' => 'Jakarta Selatan',
        //                 'country' => 'Indonesia',
        //                 'postal_code' => '12345',
        //                 'state' => 'Daerah Khusus Ibukota Jakarta',
        //                 'street_line1' => 'Jalan Makan',
        //                 'street_line2' => 'Kecamatan Kebayoran Baru'
        //             ]
        //         ]
        //     ],
        //     'customer_notification_preference' => [
        //         'invoice_created' => [
        //             'whatsapp',
        //             'sms',
        //             'email',
        //             'viber'
        //         ],
        //         'invoice_reminder' => [
        //             'whatsapp',
        //             'sms',
        //             'email',
        //             'viber'
        //         ],
        //         'invoice_paid' => [
        //             'whatsapp',
        //             'sms',
        //             'email',
        //             'viber'
        //         ],
        //         'invoice_expired' => [
        //             'whatsapp',
        //             'sms',
        //             'email',
        //             'viber'
        //         ]
        //     ],
        //     'success_redirect_url' => 'https=>//www.google.com',
        //     'failure_redirect_url' => 'https=>//www.google.com',
        //     'currency' => 'IDR',
        //     // 'items' => [
        //     //     [
        //     //         'name' => 'Air Conditioner',
        //     //         'quantity' => 1,
        //     //         'price' => 100000,
        //     //         'category' => 'Electronic',
        //     //         'url' => 'https=>//yourcompany.com/example_item'
        //     //     ]
        //     // ],
        //     // 'fees' => [
        //     //     [
        //     //         'type' => 'ADMIN',
        //     //         'value' => 5000
        //     //     ]
        //     // ]
        // ];


        $params = [
            'external_id' => $inv,
            'payer_email' => auth()->user()->email,
            'description' => $desc,
            'amount' => $amount,
            'fees'  => $fees,
            'success_redirect_url' => route('spp-payment-success'),
            'failure_redirect_url' => route('spp-payment-fail')
            // 'for-user-id' => '5c2323c67d6d305ac433ba20'
        ];
        // dd($params);
        try {
            $response = Http::withBasicAuth(env('XENDIT_SECRET_API_KEY'), '')
                ->post('https://api.xendit.co/v2/invoices', $params);
            if ($response->status() == 200) {

                $response = $response->object();

                $student->update([
                    'status' => 'pending'
                ]);

                $transaction = Transaction::create([
                    'trx_id' => $inv,
                    'payment_link' => $response->invoice_url,
                    'student_id' => $student->id,
                    'amount' => $amount,
                    'desc' => $desc,
                    'payment_status' => $response->status,
                ]);

                return redirect($response->invoice_url);
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function callbackXendit()
    {
        $data = request()->all();
        $status = $data['status'];
        $external_id = $data['external_id'];
        $currentYear = Carbon::now()->year;

        $transaction = Transaction::where('trx_id', $external_id)
            ->where('created_at', $currentYear)
            ->first();
        $student = Student::find($transaction->student_id);

        if ($transaction) {

            if ($status == "PAID") {
                $transaction->update([
                    'payment_status' => 'success'
                ]);

                $student->update([
                    'status' => 'paid'
                ]);

                $dataEmail["email"] = $student->student->email;
                $dataEmail["title"] = "From Fun English Course";

                $pdf = PDF::loadView('pages.admin.receipt-pdf', ['data' => $student]);

                // send email to student
                Mail::send('pages.emails.ReceiptMail', ['data' => $student], function ($message) use ($dataEmail, $pdf) {
                    $message->to($dataEmail["email"], 'Payment Success To Fun English Course')
                        ->subject($dataEmail["title"])
                        ->attachData($pdf->output(), 'receipt.pdf');
                });
            }

            if ($status == "EXPIRED") {
                $transaction->update([
                    'payment_status' => 'expired'
                ]);

                $student->update([
                    'status' => 'unpaid'
                ]);

                $dataEmail["email"] = $student->student->email;
                $dataEmail["title"] = "From Fun English Course";

                $pdf = PDF::loadView('pages.admin.invoice-pdf', ['data' => $student]);

                // send email to student
                Mail::send('pages.emails.InvoiceMail', ['data' => $student], function ($message) use ($dataEmail, $pdf) {
                    $message->to($dataEmail["email"], 'Payment Expired To Fun English Course')
                        ->subject($dataEmail["title"])
                        ->attachData($pdf->output(), 'invoice.pdf');
                });
            }
        }

        if (!$transaction) {
            return redirect()->route('spp-payment-fail');
        }
    }
}
