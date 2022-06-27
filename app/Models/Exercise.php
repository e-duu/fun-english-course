<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'photo',
        'description',
        'lesson_id',
    ];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function scores()
    {
        return $this->hasMany(Score::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($model) {
            $model->questions()->each(function ($question) {
                $question->delete();
            });
            $model->scores()->each(function ($score) {
                $score->delete();
            });
        });
    }
}
