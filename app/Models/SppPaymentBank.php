<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SppPaymentBank extends Model
{
    use HasFactory;

    protected $fillable = [
        'spp_month_id',
        'bank_id',
        'account_number',
        'bank_type',
        'date',
        'amount',
        'description',
        'type',
        'balance',
        'code',
        'recipent_name'
    ];
}
