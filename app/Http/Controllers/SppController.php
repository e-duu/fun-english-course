<?php

namespace App\Http\Controllers;

use App\Mail\InvoiceMail;
use App\Models\Level;
use App\Models\LevelUser;
use App\Models\SppMonth;
use App\Models\SppPayment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SppController extends Controller
{
    public function index(Request $request)
    {
        $levelFt = $request->level;
        $levels = Level::all();
        if ($levelFt != null) {
            $data = SppMonth::whereHas('level', function($query){
                $query->where('id', request()->level);
            })->paginate(5);
            $filter = $levelFt;
            $students = SppMonth::whereHas('level', function($query){
                $query->where('id', request()->level);
            })->get();
        } else {
            $data = SppMonth::paginate(5);
            $filter = null;
            $students = SppMonth::get();
        }
        return view('pages.admin.spps.index', compact(
            'data',
            'filter',
            'levels',
            'students',
        ));
    }

    public function create()
    {
        $users = User::where('role', 'student')->get();
        $levelUsers = LevelUser::with(['level'])->get();
        $levels = Level::get();
        return view('pages.admin.spps.create', compact('users', 'levels', 'levelUsers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'month' => 'required|max:255',
            'price' => 'required',
            'user_id' => 'required',
            'level_id' => 'required',
        ],
        [
            'month.required' => 'please input recipient month',
            'price.required' => 'please input recipient price',
            'user_id.required' => 'please input recipient student',
            'level_id.required' => 'please input recipient student',
        ]);

        // $data = $request->all();

        $code = mt_rand(1,999);
        // dd($code);

        SppMonth::create([
            'month' => $request->month,
            'price' => $request->price,
            'code' => $code,
            'user_id' => $request->user_id,
            'level_id' => $request->level_id,
        ]);
        return redirect()->route('spp.all');
    }

    public function edit($id)
    {
        $data = SppMonth::findOrFail($id);
        $users = User::where('role', 'student')->get();
        $levels = LevelUser::get();
        return view('pages.admin.spps.edit', compact('users', 'data', 'levels'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'month' => 'required',
            'price' => 'required|max:255',
            'user_id' => 'required',
            'level_id' => 'required',
            'status' => 'required',
        ],
        [
            'month.required' => 'please input recipient month',
            'price.required' => 'please input recipient price',
            'user_id.required' => 'please input recipient student',
            'level_id.required' => 'please input recipient level',
            'status.required' => 'please input recipient status',
        ]);

        // $data = $request->all();
        $code = mt_rand(1,999);

        $item = SppMonth::findorfail($id);
        $item->update([
            'month' => $request->month,
            'price' => $request->price,
            'code' => $code,
            'user_id' => $request->user_id,
            'status' => $request->status,
            'level_id' => $request->level_id,
        ]);
        return redirect()->route('spp.all');
    }

    public function destroy($id)
    {
        $data = SppMonth::findOrFail($id);
        $data->sppPayment()->delete();
        $data->delete();
        return back();
    }

    public function payManually($id)
    {
        $data = SppMonth::findOrFail($id);
        return view('pages.admin.spps.pay-manually', compact('data'));
    }

    public function payManuallyProsses(Request $request, $id)
    {
        $data = SppMonth::findOrFail($id);
        if ($request->currency == 'IDR') {
            $amount = $request->IDR;
        } else if ($request->currency == 'USD') {
            $amount = $request->USD;
            if ($amount == null) {
                return back();
            }
        } else {
            return back();
        }
        SppPayment::create([
            'amount' => $amount,
            'currency' => $request->currency,
            'orderId' => rand(1000000000, 9999999999),
            'user_id' => $data->user_id,
            'spp_month_id' => $data->id,
        ]);
        $data->update([
            'status' => 'paid_manually',
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->route('spp.all');
    }

    public function sppInvoiceMail($userId, $sppMonthId)
    {
        $user = User::findOrFail($userId);
        $sppMonth = SppMonth::findOrFail($sppMonthId);

        Mail::to($user->email)->send(new InvoiceMail(
            $user,
            $sppMonth,
            $sppMonth->level->program,
            $sppMonth->level,
        ));

        return back()->with('send_invoice_to_mail', 'Invoice berhasil diunggah kepada '.$user->email);
    }
}
