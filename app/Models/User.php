<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
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
        'phone',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'id', 'user_id');
    }

    public function levels()
    {
        return $this->belongsToMany(Level::class);
    }

    public function scores()
    {
        return $this->hasMany(Score::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($model) {
            $model->scores()->each(function ($score) {
                $score->delete();
            });
            $model->payments()->each(function ($payment) {
                $payment->delete();
            });
        });
    }
}
