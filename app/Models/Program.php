<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class, 'id', 'program_id');
    }

    public function levels()
    {
        return $this->hasMany(Level::class);
    }
}
