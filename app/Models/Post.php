<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'content', 'category',
        'author_id', 'thumbnail', 'published_at'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
