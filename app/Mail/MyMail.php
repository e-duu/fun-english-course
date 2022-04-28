<?php

namespace App\Mail;

use App\Models\Level;
use App\Models\Program;
use App\Models\SppPayment;
use App\Models\Student;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $student;
    public $sppPayment;
    public $program;
    public $level;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Student $student, SppPayment $sppPayment, Program $program, Level $level, User $user)
    {
        $this->student = $student;
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
            'student', $this->student,
            'sppPayment', $this->sppPayment,
            'user', $this->user,
            'program', $this->program,
            'level', $this->level,
        ]);
    }
}
