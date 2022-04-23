<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent',
        'city',
        'country',
        'status',
        'user_id'
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
