<?php

namespace App\Http\Controllers;

use App\ComingSoon;
use App\MovieDetails;
use App\Movies;
use App\Screenings;
use App\Rules\UniqueMovie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class MovieController extends Controller
{
    public function getMovies()
    {
        $movies = Movies::all();
        return view('admin.movies.movies')->with('movies', $movies);
    }

    public function getMovie($id){
        $movie = Movies::find($id);
        return view('movie')->with('movie', $movie);
    }

    public function toggleComingSoon(Request $request){
        $movie = Movies::find($request->id);

        return response()->json([
            'updated' => $request->show === 'true' ? $movie->soon()->create() : $movie->soon()->delete()
        ]);
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
                new UniqueMovie($request->year, 'add', null)
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
            'display_photo' => 'required|image',
            'genre' =>  'required'
        ]);

        if($validator->passes()){
            $movie = new Movies();
            $movie->name = $request->name;
            if($movie->save()){
                $this->createGenres($request->genre, $movie);
                if($movie->details()->create([
                    'movie_id' => $movie->id,
                    'release_year'  =>  $request->year,
                    'image_uri' => $this->saveImageAndGetURI($request->file('display_photo'), 'display_image'),
                    'poster_uri' => $this->saveImageAndGetURI($request->file('poster'), 'poster'),
                    'youtube_url' => $request->youtube_url,
                    'audience' => $request->audience,
                    'description' => $request->description,
                    'plot' => $request->plot,
                    'starring' => $request->starring,
                    'running_time' => $request->running_time,
                    'facebook' => $request->facebook,
                    'twitter' => $request->twitter,
                    'director' => $request->director
                ])){
                    return redirect('/admin/movies');
                }
            }
        }else{
            return redirect('/admin/movies/add')->withInput()->withErrors($validator);
        }
    }

    public function createGenres($genres, $movie){
        foreach($genres as $genre){
            $movie->genre()->create([
                'genre_id'  =>  $genre
            ]);
        }
    }

    public function deleteMovie(Request $request)
    {
        $movie = Movies::find($request->id);
        if(
            $this->deleteImage($movie->details->image_uri) &&
            $this->deleteImage($movie->details->poster_uri)
        ){
            if($movie->delete()){
                return response()->json([
                    'deleted' => true
                ]);
            }
        }

        return response()->json([
            'deleted' => true
        ]);
    }


    public function editMovie($id)
    {
        $movie = Movies::find($id);
        return view('admin.movies.edit')->with('movie', $movie);
    }

    public function updateMovie(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' =>  [
                'required',
                new UniqueMovie($request->year, 'update', $request->id)
            ],
            'year' =>  'required|numeric|min:1850|max:2030',
            'director' =>  'required',
            'audience' => 'required',
            'youtube_url' =>  'required',
            'description' => 'required',
            'plot' => 'required',
            'starring' => 'required',
            'running_time' => 'required|numeric|min:1',
            'poster' => $request->hasFile('poster') ? 'required|image' : '',
            'display_photo' => $request->hasFile('display_photo') ? 'required|image' : '',
            'genre' =>  'required'
        ]);

        if($validator->passes()){
            $movie = Movies::find($request->id);
            $movie->name = $request->name;
            $movie->genre()->delete();
            $this->createGenres($request->genre, $movie);

            $updates = [
                'release_year'  =>  $request->year,
                'youtube_url' => $request->youtube_url,
                'audience' => $request->audience,
                'description' => $request->description,
                'plot' => $request->plot,
                'starring' => $request->starring,
                'running_time' => $request->running_time,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'director' => $request->director
            ];

            if($request->hasFile('poster')){
                $this->deleteImage($movie->details->poster_uri);
                $updates['poster_uri'] = $this->saveImageAndGetURI($request->file('poster'), 'poster');
            }

            if($request->hasFile('display_photo')){
                $this->deleteImage($movie->details->image_uri);
                $updates['image_uri'] = $this->saveImageAndGetURI($request->file('display_photo'), 'display_image');
            }


            if($movie->save()){
                if($movie->details()->update($updates)){
                    return redirect('/admin/movies');
                }
            }
        }else{
            return redirect('/admin/movies/'.$request->id.'/edit')->withInput()->withErrors($validator);
        }
    }

    private function saveImageAndGetURI($image,$type){
        $path = Storage::disk('public')->putFileAs(
            $type, $image, str_random(10) .'.'.$image->getClientOriginalExtension()
        );
        return $path;
    }

    private function deleteImage($image){
        return Storage::disk('public')->delete($image);
    }


}
