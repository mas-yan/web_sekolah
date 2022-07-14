<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $fillable = ['slider', 'link'];

    public function scopeSlider($query)
    {
        return $query->select('slider')->get();
    }

    public function getSliderAttribute($image)
    {
        return asset('storage/sliders/' . $image);
    }
}
