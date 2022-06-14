<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['category'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function getImageAttribute($image)
    {
        return asset('storage/Category/' . $image);
    }
}
