<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Student extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function getStudents()
    {
        $ttl = 60; // Cache results for 60 minutes
        $cacheKey = 'students';

        return Cache::remember($cacheKey, $ttl, function () {
            return self::all();
        });
    }
}
