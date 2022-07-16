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
        'currency',
        'orderId',
        'user_id',
        'student_id',
    ];

    public function user()
    {
        $this->belongsTo(User::class, 'id', 'user_id');
    }

    public function student()
    {
        $this->belongsTo(Student::class, 'id', 'student_id');
    }
}
