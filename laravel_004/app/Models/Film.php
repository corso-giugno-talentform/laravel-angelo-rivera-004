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
        'author_id',
        'cover',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
    public function genres() //plurale
    {
        return $this->belongsToMany(Genre::class);
    }
}
