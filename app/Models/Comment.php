<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    use HasFactory;

    // Tambahkan field yang diizinkan untuk mass assignment
    protected $fillable = ['user_id', 'post_id', 'body'];

    // Relasi ke model Post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    // Relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
