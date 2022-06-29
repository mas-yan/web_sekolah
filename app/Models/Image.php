<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'image',
        'title',
        'slug'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getImageAttribute($image)
    {
        return asset('storage/images/' . $image);
    }
}
