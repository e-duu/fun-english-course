<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class, 'id', 'recipient_id');
    }
}
