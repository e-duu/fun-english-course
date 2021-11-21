<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'lesson_id',
    ];

    public function lessons()
    {
        return $this->belongsTo(Lesson::class);
    }
}
