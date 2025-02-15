<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'username',
        'bio',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function writings()
    {
        return $this->hasMany(Writing::class);
    }

    public function savedWritings()
    {
        return $this->belongsToMany(Writing::class, 'writing_user', 'user_id', 'writing_id')->withTimestamps();
    }

    public static function saves($user)
    {
        return Writing::join('writing_user', 'writings.id', '=', 'writing_user.writing_id')
            ->join('users', 'users.id', '=', 'writing_user.user_id')
            ->where('users.id', $user->id)
            ->select('writings.*')
            ->get();
    }
}
