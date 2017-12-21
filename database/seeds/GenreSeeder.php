<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        \App\Genres::truncate();
        Schema::enableForeignKeyConstraints();
        $genres = [
            'Action',
            'Adventure',
            'Animation',
            'Biography',
            'Comedy',
            'Crime',
            'Documentary',
            'Drama',
            'Family',
            'Fantasy',
            'Film',
            'Noir',
            'History',
            'Horror',
            'Music',
            'Musical',
            'Mystery',
            'Romance',
            'Sci-Fi',
            'Short',
            'Sport',
            'Superhero',
            'Thriller',
            'War',
            'Western'
        ];
        foreach($genres as $genre){
            $g = new \App\Genres();
            $g->name = $genre;
            $g->save();
        }

        echo 'Genres Seeded';
    }
}
