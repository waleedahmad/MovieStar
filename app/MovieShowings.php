<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovieShowings extends Model
{
    protected $table = 'movie_showings';

    public function movie(){
        return $this->hasOne('App\Movies','id', 'movie_id');
    }

    public function reservations(){
        return $this->hasMany('App\Reservations','showings_id', 'id');
    }

}
