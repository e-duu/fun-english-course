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
        $request->validate([
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
        ]);
        
        $data = $request->all();
        $moota = Moota::create($data);
        return redirect()->route('moota', $moota->id);
    }

    public function getListBank()
    {
        $api = Moota::first();
        // dd($api->api_key);
        
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://app.moota.co/api/v2/bank');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Accept: application/json',
            'Authorization: Bearer '.$api->api_key
        ]);
        $response = curl_exec($curl);
        $data = json_decode($response, true);
        // return $data;
        // return $data['data'][0]['atas_nama'];

        $account = AccountBank::where('account_number', $data['data'][0]['account_number'])->first();
        
        if (!$account) {
            $bank = AccountBank::create([
                'account_name' => $data['data'][0]['atas_nama'],
                'account_number' => $data['data'][0]['account_number'],
                'type' => $data['data'][0]['bank_type'],
            ]);
        }

        return back();
    }
}
