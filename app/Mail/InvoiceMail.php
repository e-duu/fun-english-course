<?php

namespace App\Mail;

use App\Models\Level;
use App\Models\Program;
use App\Models\SppMonth;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $sppMonth;
    public $program;
    public $level;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, SppMonth $sppMonth, Program $program, Level $level)
    {
        $this->user = $user;
        $this->sppMonth = $sppMonth;
        $this->program = $program;
        $this->level = $level;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Invoice spp (fun english course)')->markdown('pages.emails.invoiceMail')->with([
            'user' => $this->user,
            'sppMonth' => $this->sppMonth,
            'program', $this->program,
            'level', $this->level,
        ]);
    }
}
