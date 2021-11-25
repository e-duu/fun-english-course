<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Program;
use App\Models\Recipient;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentPageController extends Controller
{
    public function index()
    {
        $users = User::all();
        $programs = Program::all();
        $levels = Level::all();
        $recipients = Recipient::all();

        return view('pages.payment', compact('users', 'programs', 'levels', 'recipients'));
    }
}
