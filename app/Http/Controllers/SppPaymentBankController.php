<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Student;
use App\Mail\InvoiceMail;
use Illuminate\Http\Request;
use App\Models\SppPaymentBank;
use Hamcrest\Core\HasToString;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;

class SppPaymentBankController extends Controller
{
    public function store(Request $request)
    {
        // $notif = '[{
        //     "account_number":"0700010372956",
        //     "date":"2022-05-31 06:14:54",
        //     "description":"Bunga 07000",
        //     "note":"",
        //     "amount":30501.22,
        //     "type":"CR",
        //     "balance":74951302.52,
        //     "updated_at":"2022-06-01 06:14:54",
        //     "created_at":"2022-06-01 06:14:54",
        //     "mutation_id":"EpWoyYV6OzJ",
        //     "token":"EpWoyYV6OzJ",
        //     "bank_id":"n3ykVR4ykNR",
        //     "taggings":[],
        //     "bank":{
        //         "corporate_id":"GA00710",
        //         "username":"edge0001",
        //         "atas_nama":"Edukasi Diversitas Global Excelsia",
        //         "balance":"74945202.28",
        //         "account_number":"0700010372956",
        //         "bank_type":"mandiriMcm2V2",
        //         "pkg":null,
        //         "login_retry":0,
        //         "date_from":"2022-06-01 00:00:00",
        //         "date_to":"2022-06-01 00:00:00",
        //         "meta":{
        //             "session_id":"6bf29455-cf99-48f2-b32e-85898e5bbecc",             "activity_summary":"Ditemukan 8 mutasi dalam 18.31 detik"},"interval_refresh":15,
        //             "next_queue":"2022-06-01 06:29:01",
        //             "is_active":true,"in_queue":0,
        //             "in_progress":0,
        //             "is_crawling":1,
        //             "recurred_at":"2022-06-01 23:25:05",
        //             "created_at":"2022-04-10 13:33:35",
        //             "token":"n3ykVR4ykNR",
        //             "bank_id":"n3ykVR4ykNR",
        //             "label":"Mandiri MCM 2",
        //             "last_update":"2022-05-31T23:14:01.000000Z",
        //             "icon":"https:\/\/app.moota.co\/images\/icon-bank-mandiriMcm2V2.png"}
        //         }
        //     ]';

        // $notif = '[
        //         {
        //             "bank_id" : "3245234",
        //             "bank_type" : "BRI",
        //             "account_number": "123124",
        //             "date": "2022-04-11 14:33:01",
        //             "description": "TRSF E-BANKING CR 11/10 124123 MOOTA CO",
        //             "amount": 300191,
        //             "type": "CR",
        //             "balance": 520000,
        //             "updated_at": "2019-11-10 14:33:01",
        //             "created_at": "2019-11-10 14:33:01",
        //             "mutation_id": "IHBb97sba7d",
        //             "token": "OASiuh(DYNb97"
        //         }
        //     ]';

        //konversi ke string
        $notif = json_encode($request->all());

        $notifications = json_decode($notif, true);
        // $notifications = json_decode($notif, true);
        // dd($notifications);

        if ($notif) {
            foreach ($notifications as $data) {
                // kode unik
                $unique_code = substr($data['amount'], -3);
                // dd($data);


                $spp = Student::where('date', '>=', date('Y-m-d 00:00:00'))->where('status', 'pending')->where('code', $unique_code)->first();
                // dd($spp);

                $spp->update([
                    'status' => 'paid',
                    'code' => null,
                ]);

                //send mail
                $student = Student::findOrFail($spp->id);

                $dataEmail["email"] = $student->student->email;
                $dataEmail["title"] = "From Fun English Course";

                $this->namePdf = 'receipt.pdf';
                $pdf = PDF::loadView('pages.admin.receipt-pdf', ['data' => $student]);

                // send email to student
                Mail::send('pages.emails.ReceiptMail', ['data' => $student], function ($message) use ($dataEmail, $pdf) {
                    $message->to($dataEmail["email"], $dataEmail["email"])
                        ->subject($dataEmail["title"])
                        ->attachData($pdf->output(), $this->namePdf);
                });

                // send email to company
                Mail::send('pages.emails.SuccessMail', ['data' => $student], function ($message) use ($dataEmail, $pdf) {
                    $message->to('edge.edukasi@gmail.com', 'Payment Success To Fun English Course')
                        ->subject('Payment Success To Fun English Course')
                        ->attachData($pdf->output(), $this->namePdf);
                });

                // $store = SppPaymentBank::create([
                //     'spp_month_id' => $spp->id,
                //     'bank_id'   => $data['bank_id'],
                //     'account_number'   => $data['account_number'],
                //     'bank_type'   => $data['bank_type'],
                //     'date'   => date('Y-m-d H:i:s'),
                //     'amount'   => $data['amount'],
                //     'description'   => $data['description'],
                //     'type'   => $data['type'],
                //     'balance'   => $data['balance'],
                //     'code'   => $unique_code,
                //     // 'recipient_name' => 'muji',
                //     // 'send_name' => 'kuwat',
                // ]);

                return response()->json(['success' => 'success'], 200);
            }
        }
    }


    public function jGetDataOrder($data)
    {
        $tgl = date('Y-m-d 00:00:00');

        $query = Student::where('date', '>=', $tgl)->where('code', $data);

        return $query->row();
    }

    public function updateMoota($jquin)
    {
        $data = [
            'status_pembayaran' => '1'
        ];

        $this->db->where('id_order', $jquin);
        $this->db->update('tbl_order', $data);
    }
}
