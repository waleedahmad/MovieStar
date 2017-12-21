<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    protected $table = 'movies';

    public function details(){
        return $this->hasOne('App\MovieDetails', 'movie_id', 'id');
    }

}
