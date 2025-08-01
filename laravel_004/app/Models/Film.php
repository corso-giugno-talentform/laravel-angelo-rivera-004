<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $fillable = [
        'title',
        'release_year',
        'duration',
        'description',
        'genre',
        'cover',
    ];
}
