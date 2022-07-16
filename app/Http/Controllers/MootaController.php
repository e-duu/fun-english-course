<?php

namespace App\Http\Controllers;

use App\Models\AccountBank;
use App\Models\Moota;
use Illuminate\Http\Request;

class MootaController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Moota::first();
        return view('pages.admin.mootas.index', compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'api_key' => 'required',
                // 'account_name' => 'required|max:255',
                // 'account_number' => 'required|max:255',
                'webhook_url' => 'required|max:255',
            ],
            [
                'api_key.required' => 'please input api key',
                // 'account_holder.required' => 'please input account holder name',
                // 'account_number' => 'please input rekening bank',
                'webhook_url.required' => 'please input webhook url',
            ]
        );

        $data = $request->all();
        $moota = Moota::create($data);
        return redirect()->route('moota', $moota->id);
    }

    public function getListBank()
    {
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
        $data = json_decode($response, true);
        // return $data;
        // return $data['data'][0]['atas_nama'];

        // dd($data);
        foreach ($data['data'] as $item) {
            // dd($item);

            $account = AccountBank::where('account_number', $item['account_number'])->first();

            if (!$account) {
                $bank = AccountBank::create([
                    'account_name' => $item['atas_nama'],
                    'account_number' => $item['account_number'],
                    'type' => $item['bank_type'],
                ]);
            }
        }


        // $account = AccountBank::where('account_number', $data['data'][0]['account_number'])->first();

        // if (!$account) {
        //     $bank = AccountBank::create([
        //         'account_name' => $data['data'][0]['atas_nama'],
        //         'account_number' => $data['data'][0]['account_number'],
        //         'type' => $data['data'][0]['bank_type'],
        //     ]);
        // }

        return back();
    }
}
