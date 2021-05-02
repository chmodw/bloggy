<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * Specify the relationship between the comment and user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Specify the relationship between post and comment
     */
    public function post()
    {
        return $this->belongsTo(Comment::class);
    }

}
