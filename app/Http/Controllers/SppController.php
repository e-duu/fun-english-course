<?php

namespace App\Http\Controllers;

use App\Models\SppMonth;
use Illuminate\Http\Request;

class SppController extends Controller
{
    public function index()
    {
        return view('');
    }

    public function create()
    {
        return view('');
    }

    public function store(Request $request)
    {
        $request->validate([
            'month' => 'required|max:255',
            'price' => 'required',
            'user_id' => 'required',
        ],
        [
            'month.required' => 'please input recipient month',
            'price.required' => 'please input recipient price',
            'user_id.required' => 'please input recipient student',
        ]);

        $data = $request->all();
        SppMonth::create($data);
        return redirect()->route('');
    }

    public function edit($id)
    {
        $data = SppMonth::findOrFail($id);
        return view('', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'month' => 'required|max:255',
            'price' => 'required',
            'user_id' => 'required',
        ],
        [
            'month.required' => 'please input recipient month',
            'price.required' => 'please input recipient price',
            'user_id.required' => 'please input recipient student',
        ]);

        $data = $request->all();
        $item = SppMonth::findorfail($id);
        $item->update($data);
        return redirect()->route('');
    }

    public function destroy($id)
    {
        $data = SppMonth::findOrFail($id);
        $data->delete();
        return back();
    }
}
