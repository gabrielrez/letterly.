<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Writing extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'content',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function savedByUsers()
    {
        return $this->belongsToMany(User::class, 'writing_user', 'writing_id', 'user_id')->withTimestamps();
    }

    public function isSave(): bool
    {
        return $this->savedByUsers()->where('user_id', request()->user()->id)->exists();
    }
}
