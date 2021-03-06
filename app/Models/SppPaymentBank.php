<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SppPaymentBank extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'bank_id',
        'account_number',
        'bank_type',
        'date',
        'amount',
        'description',
        'type',
        'balance',
        'code',
        'recipient_name',
        'send_name'
    ];
}
