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

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($model) {
            $model->materials()->each(function ($material) {
                $material->delete();
            });

            $model->exercises()->each(function ($exercise) {
                $exercise->delete();
            });
            
            $model->downloadables()->each(function ($downloadable) {
                $downloadable->delete();
            });

            $model->material_details()->each(function ($material_detail) {
                $material_detail->delete();
            });
        });
    }
}
