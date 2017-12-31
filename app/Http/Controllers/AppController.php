<?php

namespace App\Http\Controllers;

use App\Movies;
use App\MovieShowings;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function home(){
        $slider = MovieShowings::groupBy('movie_id')->where('show_time','>', Carbon::now()->toDateTimeString())->get();
        $schedule = MovieShowings::groupBy(['movie_id', 'day'])->where('show_time','>', Carbon::now()->toDateTimeString())->get();
        $coming_soon = Movies::join('coming_soon', 'movies.id','=', 'coming_soon.movie_id')->select('movies.*')->get();
        return view('index')->with('slider', $slider)->with('coming_soon', $coming_soon)->with('schedule', $schedule);
    }

    public function whatsOn(){
        $schedule = MovieShowings::groupBy(['movie_id', 'day'])->where('show_time','>', Carbon::now()->toDateTimeString())->get();
        return view('whats_on')->with('schedule', $schedule);
    }
}
