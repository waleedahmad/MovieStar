<?php

namespace App\Http\Controllers;

use App\MovieDetails;
use App\Movies;
use App\Rules\UniqueMovie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function getMovies()
    {
        return view('admin.movies.movies');
    }

    public function addMovie()
    {
        return view('admin.movies.add');
    }

    public function saveMovie(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' =>  [
                'required',
                new UniqueMovie($request->year)
            ],
            'year' =>  'required|numeric|min:1850|max:2030',
            'director' =>  'required',
            'audience' => 'required',
            'youtube_url' =>  'required',
            'description' => 'required',
            'plot' => 'required',
            'starring' => 'required',
            'running_time' => 'required|numeric|min:1',
            'poster' => 'required|image',
            'display_photo' => 'required|image'
        ]);

        if($validator->passes()){
            $movie = new Movies();
            $movie->name = $request->name;
            if($movie->save()){
                if($movie->details()->create([
                    'movie_id' => $movie->id,
                    'release_year'  =>  $request->year,
                    'image_uri' => '',
                    'poster_uri' => '',
                    'youtube_url' => $request->youtube_url,
                    'audience' => $request->audience,
                    'description' => $request->description,
                    'plot' => $request->plot,
                    'starring' => $request->starring,
                    'running_time' => $request->running_time,
                    'facebook' => $request->facebook,
                    'twitter' => $request->twitter,
                    'directory' => $request->director
                ])){
                    return redirect('/admin/movies');
                }
            }
        }else{
            return redirect('/admin/movies/add')->withInput()->withErrors($validator);
        }
    }


    public function deleteMovie(Request $request)
    {
    }


    public function editMovie($id)
    {
        return view('admin.movies.edit');
    }

    public function updateMovie(Request $request)
    {
    }


}
