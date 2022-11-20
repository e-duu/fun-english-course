<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'number',
        'username',
        'password',
        'role',
        'email',
        'photo',
        'parent',
        'city',
        'country',
        'status',
    ];
}
