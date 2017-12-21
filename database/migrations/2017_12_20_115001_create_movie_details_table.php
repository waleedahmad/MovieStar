<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovieDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('movie_id')->unsigned();
            $table->integer('release_year');
            $table->string('image_uri');
            $table->string('poster_uri');
            $table->string('youtube_url');
            $table->string('audience');
            $table->text('description')->nullable();
            $table->text('plot')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('director')->nullable();
            $table->text('starring')->nullable();
            $table->integer('running_time');
            $table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('movie_details');
        Schema::enableForeignKeyConstraints();

    }
}
