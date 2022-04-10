<?php

namespace App\Http\Controllers;

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
            'api_key' => 'required|max:255',
            'account_name' => 'required|max:255',
            'webhook_url' => 'required|max:255',
        ],
        [
            'api_key.required' => 'please input api key',
            'account_holder.required' => 'please input lesson account holder name',
            'webhook_url.required' => 'please input webhook url',
        ]);
        
        $data = $request->all();
        $moota = Moota::create($data);
        return redirect()->route('moota', $moota->id);
    }
}
