<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SppMonth extends Model
{
    use HasFactory;

    protected $table = 'spp_months';

    protected $fillable = [
        'month',
        'price',
        'status',
        'code',
        'user_id',
        'level_id',
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id', 'id');
    }

    public function sppPayment()
    {
        return $this->belongsTo(SppPayment::class);
    }

    public function sppPaymentBank()
    {
        return $this->belongsTo(SppPaymentBank::class);
    }
}
