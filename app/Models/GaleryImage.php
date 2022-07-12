<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleryImage extends Model
{
    use HasFactory;
    protected $fillable = [
        'image_id',
        'image',
    ];

    public function image()
    {
        return $this->belongsToMany(Image::class);
    }

    public function getImageAttribute($image)
    {
        return asset('storage/images/' . $image);
    }
}
