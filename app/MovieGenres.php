<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovieGenres extends Model
{
    protected $table = 'movie_genres';

    protected $fillable = [
        'movie_id',
        'genre_id'
    ];

    public function info(){
        return $this->hasOne('App\Genres', 'id', 'genre_id');
    }

}
