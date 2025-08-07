<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Film extends Model
{

    use HasFactory;
    use Searchable;

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
    public function toSearchableArray()
    {
        // $array = $this->toArray();

        $genres = $this->genres->pluck('name')->implode(', ');

        return [
            'id' => $this->id,
            'title' => $this->title,
            'release_year' => $this->release_year,
            'genre' => $genres,
        ];

        // return $array;
    }
}
