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
        $data = Student::where('status', '!=', 'unpaid')->where('user_id', $auth)->where('month', '<=', Carbon::now()->month)->latest()->paginate(12);
        $needPays = Student::where('user_id', $auth)
            ->where('status', 'unpaid')
            ->whereBetween('month', [1, Carbon::now()->month + 1])
            ->where('year', Carbon::now()->year)
            ->orderBy('month')
            ->get();
        return view('pages.payment', compact('data', 'needPays'));

        // to take month now and next month
        // ->where('month', Carbon::now()->month)
        // ->orWhere('month', Carbon::now()->month + 1)
    }

    public function sppPayment($id)
    {
        $data = Student::findOrFail($id);
        return view('pages.sppPayment', compact('data'));
    }

    public function sppPaymentDetail($id)
    {
        $data = Student::findOrFail($id);
        $account_banks = AccountBank::get();

        // $api = Moota::first();
        // dd($api->api_key);

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://app.moota.co/api/v2/bank');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Accept: application/json',
            'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiJucWllNHN3OGxsdyIsImp0aSI6IjI5ZWY0NWU1ODU2NzlkNzJmZGI0OTFjNjEyNTU0YmYyNDY2ZDc2MDI2NmU1MjJhZWU4YTU4NWRmYzJkOTc1YjhlYTA1YTJjM2FlNGVmOTZjIiwiaWF0IjoxNjQ5NTgzMDA3Ljg3NjI3OSwibmJmIjoxNjQ5NTgzMDA3Ljg3NjI4MywiZXhwIjoxNjgxMTE5MDA3Ljg3NDQwOSwic3ViIjoiMjMzMzgiLCJzY29wZXMiOlsiYXBpIl19.31c7PhlQbtkgrQ8RgVeRRuu13nMXrdweW4o6ZRr1njqrqzmbJ9ptHzxaLPNuRfSKEhNqr0CBVmPN2HZO1ZA8Nud0fc2RWp9OEiVOM1BFQs2QbAi64Fdmq7HgUfZ-9R-pXuJ8ykaFTAPOOGarpoccDyvfgLANWpcP_KsSIpt8My5h5lgZiEAvE8VPa_VebdmLsPrB1dqZ1eEBTlz0hDKNznWB4Wa6W-SzxXnXbeeG6VJaPcU_eQH-iFf2QmdmzpMF8lG9pGbxVe9Bit3SOFghPCZ3ZBSV8PoLPoW287xm_jygn-epRsmobECYV4Z0o1BY2yVrhLJVSBMTlbpnOB-PccesjYz1UdCWfnWnFrinL12ChE_37wD3F8NfdQ92eSwj1alq7blo4maOVY_V2x9gCQDaVaFerGGEGAFMito8DOHAo_RAGVT4SzHlqbl_73YcZREMiNTqnAjAmqokSutAa5Rbk7tZWyZ1YS-88aNXSitlZ_Gwkjc3fQ5eKxRAZ6tLZpfTJGhDk8866cMJlg883hgQhPJcQ5wsOuLN_Fa9iR6QXE9e0vShr2R6wUilTpwhZjAAiq3TiQNDX8Is4LcQSDuE9cndZZ72oO6jlHG6dC5LsXy9zpliCdWAydPhSKdh7e7XGePss_34uwjteJ_qBMism0ELJgcmboncFKBTVfY'
        ]);
        $response = curl_exec($curl);
        $dataBanks = json_decode($response);

        // take data bank where is_active = 1
        $dataBanks = $dataBanks->data;
        $dataBanks = array_filter($dataBanks, function ($item) {
            return $item->is_active == 1;
        });
        $dataBanks = array_values($dataBanks);

        // dd($data);
        // foreach ($data['data'] as $item) {

        //     $account = AccountBank::where('account_number', $item['account_number'])->first();

        //     if (!$account) {
        //         $bank = AccountBank::create([
        //             'account_name' => $item['atas_nama'],
        //             'account_number' => $item['account_number'],
        //             'type' => $item['bank_type'],
        //         ]);
        //     }
        // }


        if ($data->status == 'unpaid') {
            $data->update([
                'date' => Carbon::now(),
                'dateEnd' => Carbon::now()->addDay(),
                'status' => 'pending',
            ]);
        }

        if ($data->status == 'pending' && $data->dateEnd < Carbon::now()) {
            $data->update([
                'status' => 'unpaid',
                'date' => null,
                'dateEnd' => null,
            ]);

            return back()->with('failed', 'the transaction is canceled because it exceeds the transfer time limit !');
        } else if ($data->status == 'paid') {
            return view('pages.paymentSuccess');
        } else {
            return view('pages.sppPaymentDetail', compact('data', 'dataBanks', 'account_banks'));
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
        return view('pages.paymentSuccess');
    }

    public function sppPaymentFail($student_id)
    {
        $student = Student::findOrFail($student_id);

        return view('pages.paymentFail', compact('student'));
    }
}
