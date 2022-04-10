<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moota extends Model
{
    use HasFactory;

    protected $fillable = [
        'api_key',
        'account_name',
        'webhook_url',
    ];
}
