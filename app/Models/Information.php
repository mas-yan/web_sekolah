<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
    ];

    protected $table = 'informations';

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getDateAttribute()
    {
        return "{$this->created_at->translatedFormat('l, jS F Y')}";
    }
}
