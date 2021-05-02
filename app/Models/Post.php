<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * Specify the relationship between the post and user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Specify the relationship between post and comments
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
