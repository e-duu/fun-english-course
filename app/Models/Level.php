<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'program_id',
    ];
    
    public function payments()
    {
        return $this->hasMany(Payment::class, 'id', 'level_id');
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}