<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovieDetails extends Model
{
    protected $table = 'movie_details';

    protected $fillable = [
        'movie_id',
        'release_year',
        'image_uri',
        'poster_uri',
        'youtube_url',
        'audience',
        'description',
        'plot',
        'starring',
        'running_time',
        'facebook',
        'twitter',
        'director'
    ];

}
