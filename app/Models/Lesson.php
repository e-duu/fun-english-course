<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'level_id',
    ];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function materials()
    {
        return $this->hasMany(Material::class);
    }

    public function exercises()
    {
        return $this->hasMany(Exercise::class);
    }

    public function downloadables()
    {
        return $this->hasMany(Downloadable::class);
    }

    public function material_details()
    {
        return $this->hasMany(Material::class, 'id', 'lesson_id');
    }
}
