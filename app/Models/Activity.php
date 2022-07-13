<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'date',
        'description',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getTglAttribute($date)
    {
        $carbon = Carbon::createFromDate($date);
        return $carbon->translatedFormat('l, jS F Y');
    }
}
