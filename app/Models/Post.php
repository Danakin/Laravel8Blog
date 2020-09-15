<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'user_id', 'slug', 'published', 'image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getShortDescriptionAttribute()
    {
        // Access with $post->short_description - Laravel Mutators
        return Str::limit($this->description, 147, '(...)');
    }
}
