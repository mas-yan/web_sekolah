<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'description'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeJurusan($query)
    {
        return $query->select('slug', 'title')->get();
    }
}
