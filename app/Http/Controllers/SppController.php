<?php

namespace App\Http\Controllers;

use App\Models\SppMonth;
use App\Models\User;
use Illuminate\Http\Request;

class SppController extends Controller
{
    public function index()
    {
        $data = SppMonth::paginate(5);
        return view('pages.admin.spps.index', compact('data'));
    }

    public function create()
    {
        $users = User::where('role', 'student')->get();
        return view('pages.admin.spps.create', compact('users'));
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
        return redirect()->route('spp.all');
    }

    public function edit($id)
    {
        $data = SppMonth::findOrFail($id);
        $users = User::where('role', 'student')->get();
        return view('pages.admin.spps.edit', compact('users', 'data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'month' => 'required',
            'price' => 'required|max:255',
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
        return redirect()->route('spp.all');
    }

    public function destroy($id)
    {
        $data = SppMonth::findOrFail($id);
        $data->delete();
        return back();
    }
}
