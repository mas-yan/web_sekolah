<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'category_id', 'image', 'description', 'article', 'title', 'slug'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getDateHumanAttribute()
    {
        return "{$this->created_at->diffForHumans()}";
    }

    public function getDateAttribute()
    {
        return "{$this->created_at->translatedFormat('l, jS F Y')}";
    }

    public function getImageAttribute($image)
    {
        return asset('storage/posts/' . $image);
    }
}
