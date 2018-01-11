<?php

namespace App;

use Carbon\Carbon;
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
        return $this->hasMany('App\Screenings', 'movie_id', 'id')->where('show_time','>', Carbon::now()->toDateTimeString());
    }

    public function soon(){
        return $this->hasOne('App\ComingSoon', 'movie_id', 'id');
    }

}
