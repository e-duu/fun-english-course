<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'program_id',
        'level_id',
        'recipient_id',
        'amount',
        'evidence',
        'note',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function programs()
    {
        return $this->belongsTo(Program::class);
    }

    public function levels()
    {
        return $this->belongsTo(Level::class);
    }

    public function recipients()
    {
        return $this->belongsTo(Recipient::class);
    }
}
