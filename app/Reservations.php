<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
    protected $table = 'reservations';

    protected $fillable = ['user_id', 'paid', 'tickets_count'];

    public function screening(){
        return $this->hasOne('App\MovieShowings','id', 'showings_id');
    }
}
