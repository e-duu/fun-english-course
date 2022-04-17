<?php

namespace App\Mail;

use App\Models\Level;
use App\Models\Program;
use App\Models\SppMonth;
use App\Models\SppPayment;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $sppMonth;
    public $sppPayment;
    public $program;
    public $level;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(SppMonth $sppMonth, SppPayment $sppPayment, Program $program, Level $level, User $user)
    {
        $this->sppMonth = $sppMonth;
        $this->sppPayment = $sppPayment;
        $this->program = $program;
        $this->level = $level;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Info Payment (fun english courses)')->markdown('pages.emails.index')->with([
            'sppMonth', $this->sppMonth,
            'sppPayment', $this->sppPayment,
            'user', $this->user,
            'program', $this->program,
            'level', $this->level,
        ]);
    }
}
