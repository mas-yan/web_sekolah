<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getLogoAttribute($image)
    {
        if ($image) {            
            return asset('storage/image/' . $image);
        }
        return asset('img/sekolah.png');
    }
}
