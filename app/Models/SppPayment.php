<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SppPayment extends Model
{
    use HasFactory;

    protected $table = 'spp_payments';

    protected $fillable = [
        'amount',
        'evidence',
        'spp_month_id',
    ];
}
