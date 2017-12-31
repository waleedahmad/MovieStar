<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    protected $table = 'movies';

    public function details(){
        return $this->hasOne('App\MovieDetails', 'movie_id', 'id');
    }

    public function genre(){
        return $this->hasMany('App\MovieGenres', 'movie_id', 'id');
    }

    public function screens(){
        return $this->hasMany('App\MovieShowings', 'movie_id', 'id');
    }

    public function soon(){
        return $this->hasOne('App\ComingSoon', 'movie_id', 'id');
    }

}
