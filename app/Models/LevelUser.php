<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelUser extends Model
{
    use HasFactory;

    protected $table = 'level_user';

    protected $fillable = [
        'level_id',
        'user_id',
    ];

    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id', 'id');
    }
}
