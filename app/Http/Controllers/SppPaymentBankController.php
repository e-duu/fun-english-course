<?php

namespace App\Http\Controllers;

use App\Models\SppMonth;
use App\Models\SppPaymentBank;
use Carbon\Carbon;
use DateTime;
use Hamcrest\Core\HasToString;
use Illuminate\Http\Request;

class SppPaymentBankController extends Controller
{
    public function index(Request $request)
    {
        // $notif = '[
        //         {
        //             "bank_id" : "3245234",
        //             "bank_type" : "BRI",
        //             "account_number": "123124",
        //             "date": "2022-04-11 14:33:01",
        //             "description": "TRSF E-BANKING CR 11/10 124123 MOOTA CO",
        //             "amount": 200108,
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


                $spp = SppMonth::where('date', '>=', date('Y-m-d 00:00:00'))->where('status', 'pending')->where('code', $unique_code)->get();
                // dd($spp);
                
                $store = SppPaymentBank::create([
                    'spp_month_id' => $spp->id,
                    'bank_id'   => $data['bank_id'],
                    'account_number'   => $data['account_number'],
                    'bank_type'   => $data['bank_type'],
                    'date'   => date('Y-m-d H:i:s'),
                    'amount'   => $data['amount'],
                    'description'   => $data['description'],
                    'type'   => $data['type'],
                    'balance'   => $data['balance'],
                    'code'   => $unique_code,
                    // 'recipient_name' => 'muji',
                    // 'send_name' => 'kuwat',
                ]);

                $spp->update([
                    'status' => 'paid',
                ]);

            }
        }
        

    }

    public function jGetDataOrder($data)
    {
        $tgl = date('Y-m-d 00:00:00');

        $query = SppMonth::where('date', '>=', $tgl)->where('code', $data);
        
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
