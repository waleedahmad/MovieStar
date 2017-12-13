@extends('layout')

@section('content')
    <div class="wrapper">

        @include('navbar')

        <div id="content_hero" style="background-image: url(img/hero-whats-on.jpg)">

            <div class="container">
                <div class="row blurb scrollme animateme" data-when="exit" data-from="0" data-to="1" data-opacity="0" data-translatey="100">
                    <div class="col-md-9">
                        <span class="title">Take a look at</span>
                        <h1>What's on this week</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="container section negative-margin">
            <div class="row">
                <div class="col-sm-12">
                    <div class="live-search">
                        <input type="text" id="search" placeholder="Type to search">
                        <i class="material-icons">search</i>
                    </div>
                    <div class="tabs movies ui-tabs ui-corner-all ui-widget ui-widget-content">
                        <ul role="tablist" class="ui-tabs-nav ui-corner-all ui-helper-reset ui-helper-clearfix ui-widget-header">
                            <li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="mon" aria-labelledby="ui-id-1" aria-selected="false" aria-expanded="false"><a href="#mon" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-1">Mon</a></li>
                            <li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tue" aria-labelledby="ui-id-2" aria-selected="false" aria-expanded="false"><a href="#tue" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-2">Tue</a></li>
                            <li role="tab" tabindex="0" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab ui-tabs-active ui-state-active" aria-controls="wed" aria-labelledby="ui-id-3" aria-selected="true" aria-expanded="true"><a href="#wed" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Today</a></li>
                            <li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="thu" aria-labelledby="ui-id-4" aria-selected="false" aria-expanded="false"><a href="#thu" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-4">Thu</a></li>
                            <li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="fri" aria-labelledby="ui-id-5" aria-selected="false" aria-expanded="false"><a href="#fri" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-5">Fri</a></li>
                            <li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="sat" aria-labelledby="ui-id-6" aria-selected="false" aria-expanded="false"><a href="#sat" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-6">Sat</a></li>
                            <li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="sun" aria-labelledby="ui-id-7" aria-selected="false" aria-expanded="false"><a href="#sun" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-7">Sun</a></li>
                            <li class="date"><span>Wednesday, 8 March</span></li>
                        </ul>
                        <div id="mon" aria-labelledby="ui-id-1" role="tabpanel" class="ui-tabs-panel ui-corner-bottom ui-widget-content" aria-hidden="true" style="display: none;">
                            <div class="row movie-tabs">
                                <div class="col-md-2 col-sm-3">
                                    <a href="#">
                                        <img src="img/movie-6.jpg" alt="Movie title">
                                    </a>
                                </div>
                                <div class="col-md-10 col-sm-9">
                                    <span class="title">Action, Adventure, Fantasy</span>
                                    <h3 class="no-underline">End of an era</h3>
                                    <p>European mercenaries searching for black powder become embroiled in the defense of End of an era of China against a horde of monstrous creatures.</p>
                                    <p><a href="#" class="arrow-button">Full synopsis</a></p>
                                    <div class="row">
                                        <div class="col-md-8 col-sm-9">
                                            <hr class="space-10">
                                            <span class="viewing-times">
<i class="material-icons">access_time</i>
Viewing times
</span>
                                            <span class="time past">14:45</span>
                                            <span class="time">18:30</span>
                                            <span class="time">20:30</span>
                                            <span class="time">24:45</span>
                                        </div>
                                        <div class="col-md-4 col-sm-3 running-time">
                                            <hr class="space-10">
                                            105 mins <span class="certificate">15</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row movie-tabs">
                                <div class="col-md-2 col-sm-3">
                                    <a href="#">
                                        <img src="img/movie-5.jpg" alt="Movie title">
                                    </a>
                                </div>
                                <div class="col-md-10 col-sm-9">
                                    <span class="title">Action, Adventure, Sci-Fi </span>
                                    <h3 class="no-underline">Days of war</h3>
                                    <p>Steve Rogers, a rejected military soldier transforms into Captain America after taking a dose of a "Super-Soldier serum". But being Captain America comes at a price as he attempts to take down a war monger and a terrorist organization.</p>
                                    <p><a href="#" class="arrow-button">Full synopsis</a></p>
                                    <div class="row">
                                        <div class="col-md-8 col-sm-9">
                                            <hr class="space-10">
                                            <span class="viewing-times">
<i class="material-icons">access_time</i>
Viewing times
</span>
                                            <span class="time past">11:00</span>
                                            <span class="time">16:00</span>
                                            <span class="time">18:00</span>
                                            <span class="time">21:00</span>
                                        </div>
                                        <div class="col-md-4 col-sm-3 running-time">
                                            <hr class="space-10">
                                            120 mins <span class="certificate">PG</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row movie-tabs">
                                <div class="col-md-2 col-sm-3">
                                    <a href="#">
                                        <img src="img/movie-8.jpg" alt="Movie title">
                                    </a>
                                </div>
                                <div class="col-md-10 col-sm-9">
                                    <span class="title">Drama</span>
                                    <h3 class="no-underline">The apocalypse</h3>
                                    <p>A working-class African-American father tries to raise his family in the 1950s, while coming to terms with the events of his life.</p>
                                    <p><a href="#" class="arrow-button">Full synopsis</a></p>
                                    <div class="row">
                                        <div class="col-md-8 col-sm-9">
                                            <hr class="space-10">
                                            <span class="viewing-times">
<i class="material-icons">access_time</i>
Viewing times
</span>
                                            <span class="time past">10:00</span>
                                            <span class="time past">12:45</span>
                                            <span class="time">17:00</span>
                                            <span class="time">21:15</span>
                                        </div>
                                        <div class="col-md-4 col-sm-3 running-time">
                                            <hr class="space-10">
                                            135 mins <span class="certificate">18</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row movie-tabs">
                                <div class="col-md-2 col-sm-3">
                                    <a href="#">
                                        <img src="img/movie-7.jpg" alt="Movie title">
                                    </a>
                                </div>
                                <div class="col-md-10 col-sm-9">
                                    <span class="title">Drama</span>
                                    <h3 class="no-underline">As she sleeps</h3>
                                    <p>A chronicle of the childhood, adolescence and burgeoning adulthood of a young black man growing up in a rough neighborhood of Miami.</p>
                                    <p><a href="#" class="arrow-button">Full synopsis</a></p>
                                    <div class="row">
                                        <div class="col-md-8 col-sm-9">
                                            <hr class="space-10">
                                            <span class="viewing-times">
<i class="material-icons">access_time</i>
Viewing times
</span>
                                            <span class="time past">11:00</span>
                                            <span class="time past">14:30</span>
                                            <span class="time">20:00</span>
                                            <span class="time">21:15</span>
                                        </div>
                                        <div class="col-md-4 col-sm-3 running-time">
                                            <hr class="space-10">
                                            117 mins <span class="certificate">U</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tue" aria-labelledby="ui-id-2" role="tabpanel" class="ui-tabs-panel ui-corner-bottom ui-widget-content" aria-hidden="true" style="display: none;">
                            <div class="row movie-tabs">
                                <div class="col-md-2 col-sm-3">
                                    <a href="#">
                                        <img src="img/movie-7.jpg" alt="Movie title">
                                    </a>
                                </div>
                                <div class="col-md-10 col-sm-9">
                                    <span class="title">Drama</span>
                                    <h3 class="no-underline">As she sleeps</h3>
                                    <p>A chronicle of the childhood, adolescence and burgeoning adulthood of a young black man growing up in a rough neighborhood of Miami.</p>
                                    <p><a href="#" class="arrow-button">Full synopsis</a></p>
                                    <div class="row">
                                        <div class="col-md-8 col-sm-9">
                                            <hr class="space-10">
                                            <span class="viewing-times">
<i class="material-icons">access_time</i>
Viewing times
</span>
                                            <span class="time past">11:00</span>
                                            <span class="time past">14:30</span>
                                            <span class="time">20:00</span>
                                            <span class="time">21:15</span>
                                        </div>
                                        <div class="col-md-4 col-sm-3 running-time">
                                            <hr class="space-10">
                                            117 mins <span class="certificate">U</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row movie-tabs">
                                <div class="col-md-2 col-sm-3">
                                    <a href="#">
                                        <img src="img/movie-5.jpg" alt="Movie title">
                                    </a>
                                </div>
                                <div class="col-md-10 col-sm-9">
                                    <span class="title">Action, Adventure, Sci-Fi </span>
                                    <h3 class="no-underline">Days of war</h3>
                                    <p>Steve Rogers, a rejected military soldier transforms into Captain America after taking a dose of a "Super-Soldier serum". But being Captain America comes at a price as he attempts to take down a war monger and a terrorist organization.</p>
                                    <p><a href="#" class="arrow-button">Full synopsis</a></p>
                                    <div class="row">
                                        <div class="col-md-8 col-sm-9">
                                            <hr class="space-10">
                                            <span class="viewing-times">
<i class="material-icons">access_time</i>
Viewing times
</span>
                                            <span class="time past">11:00</span>
                                            <span class="time">16:00</span>
                                            <span class="time">18:00</span>
                                            <span class="time">21:00</span>
                                        </div>
                                        <div class="col-md-4 col-sm-3 running-time">
                                            <hr class="space-10">
                                            120 mins <span class="certificate">PG</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row movie-tabs">
                                <div class="col-md-2 col-sm-3">
                                    <a href="#">
                                        <img src="img/movie-6.jpg" alt="Movie title">
                                    </a>
                                </div>
                                <div class="col-md-10 col-sm-9">
                                    <span class="title">Action, Adventure, Fantasy</span>
                                    <h3 class="no-underline">End of an era</h3>
                                    <p>European mercenaries searching for black powder become embroiled in the defense of End of an era of China against a horde of monstrous creatures.</p>
                                    <p><a href="#" class="arrow-button">Full synopsis</a></p>
                                    <div class="row">
                                        <div class="col-md-8 col-sm-9">
                                            <hr class="space-10">
                                            <span class="viewing-times">
<i class="material-icons">access_time</i>
Viewing times
</span>
                                            <span class="time past">14:45</span>
                                            <span class="time">18:30</span>
                                            <span class="time">20:30</span>
                                            <span class="time">24:45</span>
                                        </div>
                                        <div class="col-md-4 col-sm-3 running-time">
                                            <hr class="space-10">
                                            105 mins <span class="certificate">15</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row movie-tabs">
                                <div class="col-md-2 col-sm-3">
                                    <a href="#">
                                        <img src="img/movie-8.jpg" alt="Movie title">
                                    </a>
                                </div>
                                <div class="col-md-10 col-sm-9">
                                    <span class="title">Drama</span>
                                    <h3 class="no-underline">The apocalypse</h3>
                                    <p>A working-class African-American father tries to raise his family in the 1950s, while coming to terms with the events of his life.</p>
                                    <p><a href="#" class="arrow-button">Full synopsis</a></p>
                                    <div class="row">
                                        <div class="col-md-8 col-sm-9">
                                            <hr class="space-10">
                                            <span class="viewing-times">
<i class="material-icons">access_time</i>
Viewing times
</span>
                                            <span class="time past">10:00</span>
                                            <span class="time past">12:45</span>
                                            <span class="time">17:00</span>
                                            <span class="time">21:15</span>
                                        </div>
                                        <div class="col-md-4 col-sm-3 running-time">
                                            <hr class="space-10">
                                            135 mins <span class="certificate">18</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="wed" aria-labelledby="ui-id-3" role="tabpanel" class="ui-tabs-panel ui-corner-bottom ui-widget-content" aria-hidden="false" style="display: block;">
                            <div class="row movie-tabs">
                                <div class="col-md-2 col-sm-3">
                                    <a href="#">
                                        <img src="img/movie-6.jpg" alt="Movie title">
                                    </a>
                                </div>
                                <div class="col-md-10 col-sm-9">
                                    <span class="title">Action, Adventure, Fantasy</span>
                                    <h3 class="no-underline">End of an era</h3>
                                    <p>European mercenaries searching for black powder become embroiled in the defense of End of an era of China against a horde of monstrous creatures.</p>
                                    <p><a href="#" class="arrow-button">Full synopsis</a></p>
                                    <div class="row">
                                        <div class="col-md-8 col-sm-9">
                                            <hr class="space-10">
                                            <span class="viewing-times">
<i class="material-icons">access_time</i>
Viewing times
</span>
                                            <span class="time past">14:45</span>
                                            <span class="time">18:30</span>
                                            <span class="time">20:30</span>
                                            <span class="time">24:45</span>
                                        </div>
                                        <div class="col-md-4 col-sm-3 running-time">
                                            <hr class="space-10">
                                            105 mins <span class="certificate">15</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row movie-tabs">
                                <div class="col-md-2 col-sm-3">
                                    <a href="#">
                                        <img src="img/movie-5.jpg" alt="Movie title">
                                    </a>
                                </div>
                                <div class="col-md-10 col-sm-9">
                                    <span class="title">Action, Adventure, Sci-Fi </span>
                                    <h3 class="no-underline">Days of war</h3>
                                    <p>Steve Rogers, a rejected military soldier transforms into Captain America after taking a dose of a "Super-Soldier serum". But being Captain America comes at a price as he attempts to take down a war monger and a terrorist organization.</p>
                                    <p><a href="#" class="arrow-button">Full synopsis</a></p>
                                    <div class="row">
                                        <div class="col-md-8 col-sm-9">
                                            <hr class="space-10">
                                            <span class="viewing-times">
<i class="material-icons">access_time</i>
Viewing times
</span>
                                            <span class="time past">11:00</span>
                                            <span class="time">16:00</span>
                                            <span class="time">18:00</span>
                                            <span class="time">21:00</span>
                                        </div>
                                        <div class="col-md-4 col-sm-3 running-time">
                                            <hr class="space-10">
                                            120 mins <span class="certificate">PG</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row movie-tabs">
                                <div class="col-md-2 col-sm-3">
                                    <a href="#">
                                        <img src="img/movie-7.jpg" alt="Movie title">
                                    </a>
                                </div>
                                <div class="col-md-10 col-sm-9">
                                    <span class="title">Drama</span>
                                    <h3 class="no-underline">As she sleeps</h3>
                                    <p>A chronicle of the childhood, adolescence and burgeoning adulthood of a young black man growing up in a rough neighborhood of Miami.</p>
                                    <p><a href="#" class="arrow-button">Full synopsis</a></p>
                                    <div class="row">
                                        <div class="col-md-8 col-sm-9">
                                            <hr class="space-10">
                                            <span class="viewing-times">
<i class="material-icons">access_time</i>
Viewing times
</span>
                                            <span class="time past">11:00</span>
                                            <span class="time past">14:30</span>
                                            <span class="time">20:00</span>
                                            <span class="time">21:15</span>
                                        </div>
                                        <div class="col-md-4 col-sm-3 running-time">
                                            <hr class="space-10">
                                            117 mins <span class="certificate">U</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row movie-tabs">
                                <div class="col-md-2 col-sm-3">
                                    <a href="#">
                                        <img src="img/movie-8.jpg" alt="Movie title">
                                    </a>
                                </div>
                                <div class="col-md-10 col-sm-9">
                                    <span class="title">Drama</span>
                                    <h3 class="no-underline">The apocalypse</h3>
                                    <p>A working-class African-American father tries to raise his family in the 1950s, while coming to terms with the events of his life.</p>
                                    <p><a href="#" class="arrow-button">Full synopsis</a></p>
                                    <div class="row">
                                        <div class="col-md-8 col-sm-9">
                                            <hr class="space-10">
                                            <span class="viewing-times">
<i class="material-icons">access_time</i>
Viewing times
</span>
                                            <span class="time past">10:00</span>
                                            <span class="time past">12:45</span>
                                            <span class="time">17:00</span>
                                            <span class="time">21:15</span>
                                        </div>
                                        <div class="col-md-4 col-sm-3 running-time">
                                            <hr class="space-10">
                                            135 mins <span class="certificate">18</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="thu" aria-labelledby="ui-id-4" role="tabpanel" class="ui-tabs-panel ui-corner-bottom ui-widget-content" aria-hidden="true" style="display: none;">
                            <div class="row movie-tabs">
                                <div class="col-md-2 col-sm-3">
                                    <a href="#">
                                        <img src="img/movie-5.jpg" alt="Movie title">
                                    </a>
                                </div>
                                <div class="col-md-10 col-sm-9">
                                    <span class="title">Action, Adventure, Sci-Fi </span>
                                    <h3 class="no-underline">Days of war</h3>
                                    <p>Steve Rogers, a rejected military soldier transforms into Captain America after taking a dose of a "Super-Soldier serum". But being Captain America comes at a price as he attempts to take down a war monger and a terrorist organization.</p>
                                    <p><a href="#" class="arrow-button">Full synopsis</a></p>
                                    <div class="row">
                                        <div class="col-md-8 col-sm-9">
                                            <hr class="space-10">
                                            <span class="viewing-times">
<i class="material-icons">access_time</i>
Viewing times
</span>
                                            <span class="time past">11:00</span>
                                            <span class="time">16:00</span>
                                            <span class="time">18:00</span>
                                            <span class="time">21:00</span>
                                        </div>
                                        <div class="col-md-4 col-sm-3 running-time">
                                            <hr class="space-10">
                                            120 mins <span class="certificate">PG</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row movie-tabs">
                                <div class="col-md-2 col-sm-3">
                                    <a href="#">
                                        <img src="img/movie-7.jpg" alt="Movie title">
                                    </a>
                                </div>
                                <div class="col-md-10 col-sm-9">
                                    <span class="title">Drama</span>
                                    <h3 class="no-underline">As she sleeps</h3>
                                    <p>A chronicle of the childhood, adolescence and burgeoning adulthood of a young black man growing up in a rough neighborhood of Miami.</p>
                                    <p><a href="#" class="arrow-button">Full synopsis</a></p>
                                    <div class="row">
                                        <div class="col-md-8 col-sm-9">
                                            <hr class="space-10">
                                            <span class="viewing-times">
<i class="material-icons">access_time</i>
Viewing times
</span>
                                            <span class="time past">11:00</span>
                                            <span class="time past">14:30</span>
                                            <span class="time">20:00</span>
                                            <span class="time">21:15</span>
                                        </div>
                                        <div class="col-md-4 col-sm-3 running-time">
                                            <hr class="space-10">
                                            117 mins <span class="certificate">U</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row movie-tabs">
                                <div class="col-md-2 col-sm-3">
                                    <a href="#">
                                        <img src="img/movie-6.jpg" alt="Movie title">
                                    </a>
                                </div>
                                <div class="col-md-10 col-sm-9">
                                    <span class="title">Action, Adventure, Fantasy</span>
                                    <h3 class="no-underline">End of an era</h3>
                                    <p>European mercenaries searching for black powder become embroiled in the defense of End of an era of China against a horde of monstrous creatures.</p>
                                    <p><a href="#" class="arrow-button">Full synopsis</a></p>
                                    <div class="row">
                                        <div class="col-md-8 col-sm-9">
                                            <hr class="space-10">
                                            <span class="viewing-times">
<i class="material-icons">access_time</i>
Viewing times
</span>
                                            <span class="time past">14:45</span>
                                            <span class="time">18:30</span>
                                            <span class="time">20:30</span>
                                            <span class="time">24:45</span>
                                        </div>
                                        <div class="col-md-4 col-sm-3 running-time">
                                            <hr class="space-10">
                                            105 mins <span class="certificate">15</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row movie-tabs">
                                <div class="col-md-2 col-sm-3">
                                    <a href="#">
                                        <img src="img/movie-8.jpg" alt="Movie title">
                                    </a>
                                </div>
                                <div class="col-md-10 col-sm-9">
                                    <span class="title">Drama</span>
                                    <h3 class="no-underline">The apocalypse</h3>
                                    <p>A working-class African-American father tries to raise his family in the 1950s, while coming to terms with the events of his life.</p>
                                    <p><a href="#" class="arrow-button">Full synopsis</a></p>
                                    <div class="row">
                                        <div class="col-md-8 col-sm-9">
                                            <hr class="space-10">
                                            <span class="viewing-times">
<i class="material-icons">access_time</i>
Viewing times
</span>
                                            <span class="time past">10:00</span>
                                            <span class="time past">12:45</span>
                                            <span class="time">17:00</span>
                                            <span class="time">21:15</span>
                                        </div>
                                        <div class="col-md-4 col-sm-3 running-time">
                                            <hr class="space-10">
                                            135 mins <span class="certificate">18</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="fri" aria-labelledby="ui-id-5" role="tabpanel" class="ui-tabs-panel ui-corner-bottom ui-widget-content" aria-hidden="true" style="display: none;">
                            <div class="row movie-tabs">
                                <div class="col-md-2 col-sm-3">
                                    <a href="#">
                                        <img src="img/movie-5.jpg" alt="Movie title">
                                    </a>
                                </div>
                                <div class="col-md-10 col-sm-9">
                                    <span class="title">Action, Adventure, Sci-Fi </span>
                                    <h3 class="no-underline">Days of war</h3>
                                    <p>Steve Rogers, a rejected military soldier transforms into Captain America after taking a dose of a "Super-Soldier serum". But being Captain America comes at a price as he attempts to take down a war monger and a terrorist organization.</p>
                                    <p><a href="#" class="arrow-button">Full synopsis</a></p>
                                    <div class="row">
                                        <div class="col-md-8 col-sm-9">
                                            <hr class="space-10">
                                            <span class="viewing-times">
<i class="material-icons">access_time</i>
Viewing times
</span>
                                            <span class="time past">11:00</span>
                                            <span class="time">16:00</span>
                                            <span class="time">18:00</span>
                                            <span class="time">21:00</span>
                                        </div>
                                        <div class="col-md-4 col-sm-3 running-time">
                                            <hr class="space-10">
                                            120 mins <span class="certificate">PG</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row movie-tabs">
                                <div class="col-md-2 col-sm-3">
                                    <a href="#">
                                        <img src="img/movie-6.jpg" alt="Movie title">
                                    </a>
                                </div>
                                <div class="col-md-10 col-sm-9">
                                    <span class="title">Action, Adventure, Fantasy</span>
                                    <h3 class="no-underline">End of an era</h3>
                                    <p>European mercenaries searching for black powder become embroiled in the defense of End of an era of China against a horde of monstrous creatures.</p>
                                    <p><a href="#" class="arrow-button">Full synopsis</a></p>
                                    <div class="row">
                                        <div class="col-md-8 col-sm-9">
                                            <hr class="space-10">
                                            <span class="viewing-times">
<i class="material-icons">access_time</i>
Viewing times
</span>
                                            <span class="time past">14:45</span>
                                            <span class="time">18:30</span>
                                            <span class="time">20:30</span>
                                            <span class="time">24:45</span>
                                        </div>
                                        <div class="col-md-4 col-sm-3 running-time">
                                            <hr class="space-10">
                                            105 mins <span class="certificate">15</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row movie-tabs">
                                <div class="col-md-2 col-sm-3">
                                    <a href="#">
                                        <img src="img/movie-7.jpg" alt="Movie title">
                                    </a>
                                </div>
                                <div class="col-md-10 col-sm-9">
                                    <span class="title">Drama</span>
                                    <h3 class="no-underline">As she sleeps</h3>
                                    <p>A chronicle of the childhood, adolescence and burgeoning adulthood of a young black man growing up in a rough neighborhood of Miami.</p>
                                    <p><a href="#" class="arrow-button">Full synopsis</a></p>
                                    <div class="row">
                                        <div class="col-md-8 col-sm-9">
                                            <hr class="space-10">
                                            <span class="viewing-times">
<i class="material-icons">access_time</i>
Viewing times
</span>
                                            <span class="time past">11:00</span>
                                            <span class="time past">14:30</span>
                                            <span class="time">20:00</span>
                                            <span class="time">21:15</span>
                                        </div>
                                        <div class="col-md-4 col-sm-3 running-time">
                                            <hr class="space-10">
                                            117 mins <span class="certificate">U</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row movie-tabs">
                                <div class="col-md-2 col-sm-3">
                                    <a href="#">
                                        <img src="img/movie-8.jpg" alt="Movie title">
                                    </a>
                                </div>
                                <div class="col-md-10 col-sm-9">
                                    <span class="title">Drama</span>
                                    <h3 class="no-underline">The apocalypse</h3>
                                    <p>A working-class African-American father tries to raise his family in the 1950s, while coming to terms with the events of his life.</p>
                                    <p><a href="#" class="arrow-button">Full synopsis</a></p>
                                    <div class="row">
                                        <div class="col-md-8 col-sm-9">
                                            <hr class="space-10">
                                            <span class="viewing-times">
<i class="material-icons">access_time</i>
Viewing times
</span>
                                            <span class="time past">10:00</span>
                                            <span class="time past">12:45</span>
                                            <span class="time">17:00</span>
                                            <span class="time">21:15</span>
                                        </div>
                                        <div class="col-md-4 col-sm-3 running-time">
                                            <hr class="space-10">
                                            135 mins <span class="certificate">18</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="sat" aria-labelledby="ui-id-6" role="tabpanel" class="ui-tabs-panel ui-corner-bottom ui-widget-content" aria-hidden="true" style="display: none;">
                            <div class="row movie-tabs">
                                <div class="col-md-2 col-sm-3">
                                    <a href="#">
                                        <img src="img/movie-6.jpg" alt="Movie title">
                                    </a>
                                </div>
                                <div class="col-md-10 col-sm-9">
                                    <span class="title">Action, Adventure, Fantasy</span>
                                    <h3 class="no-underline">End of an era</h3>
                                    <p>European mercenaries searching for black powder become embroiled in the defense of End of an era of China against a horde of monstrous creatures.</p>
                                    <p><a href="#" class="arrow-button">Full synopsis</a></p>
                                    <div class="row">
                                        <div class="col-md-8 col-sm-9">
                                            <hr class="space-10">
                                            <span class="viewing-times">
<i class="material-icons">access_time</i>
Viewing times
</span>
                                            <span class="time past">14:45</span>
                                            <span class="time">18:30</span>
                                            <span class="time">20:30</span>
                                            <span class="time">24:45</span>
                                        </div>
                                        <div class="col-md-4 col-sm-3 running-time">
                                            <hr class="space-10">
                                            105 mins <span class="certificate">15</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row movie-tabs">
                                <div class="col-md-2 col-sm-3">
                                    <a href="#">
                                        <img src="img/movie-7.jpg" alt="Movie title">
                                    </a>
                                </div>
                                <div class="col-md-10 col-sm-9">
                                    <span class="title">Drama</span>
                                    <h3 class="no-underline">As she sleeps</h3>
                                    <p>A chronicle of the childhood, adolescence and burgeoning adulthood of a young black man growing up in a rough neighborhood of Miami.</p>
                                    <p><a href="#" class="arrow-button">Full synopsis</a></p>
                                    <div class="row">
                                        <div class="col-md-8 col-sm-9">
                                            <hr class="space-10">
                                            <span class="viewing-times">
<i class="material-icons">access_time</i>
Viewing times
</span>
                                            <span class="time past">11:00</span>
                                            <span class="time past">14:30</span>
                                            <span class="time">20:00</span>
                                            <span class="time">21:15</span>
                                        </div>
                                        <div class="col-md-4 col-sm-3 running-time">
                                            <hr class="space-10">
                                            117 mins <span class="certificate">U</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row movie-tabs">
                                <div class="col-md-2 col-sm-3">
                                    <a href="#">
                                        <img src="img/movie-5.jpg" alt="Movie title">
                                    </a>
                                </div>
                                <div class="col-md-10 col-sm-9">
                                    <span class="title">Action, Adventure, Sci-Fi </span>
                                    <h3 class="no-underline">Days of war</h3>
                                    <p>Steve Rogers, a rejected military soldier transforms into Captain America after taking a dose of a "Super-Soldier serum". But being Captain America comes at a price as he attempts to take down a war monger and a terrorist organization.</p>
                                    <p><a href="#" class="arrow-button">Full synopsis</a></p>
                                    <div class="row">
                                        <div class="col-md-8 col-sm-9">
                                            <hr class="space-10">
                                            <span class="viewing-times">
<i class="material-icons">access_time</i>
Viewing times
</span>
                                            <span class="time past">11:00</span>
                                            <span class="time">16:00</span>
                                            <span class="time">18:00</span>
                                            <span class="time">21:00</span>
                                        </div>
                                        <div class="col-md-4 col-sm-3 running-time">
                                            <hr class="space-10">
                                            120 mins <span class="certificate">PG</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row movie-tabs">
                                <div class="col-md-2 col-sm-3">
                                    <a href="#">
                                        <img src="img/movie-8.jpg" alt="Movie title">
                                    </a>
                                </div>
                                <div class="col-md-10 col-sm-9">
                                    <span class="title">Drama</span>
                                    <h3 class="no-underline">The apocalypse</h3>
                                    <p>A working-class African-American father tries to raise his family in the 1950s, while coming to terms with the events of his life.</p>
                                    <p><a href="#" class="arrow-button">Full synopsis</a></p>
                                    <div class="row">
                                        <div class="col-md-8 col-sm-9">
                                            <hr class="space-10">
                                            <span class="viewing-times">
<i class="material-icons">access_time</i>
Viewing times
</span>
                                            <span class="time past">10:00</span>
                                            <span class="time past">12:45</span>
                                            <span class="time">17:00</span>
                                            <span class="time">21:15</span>
                                        </div>
                                        <div class="col-md-4 col-sm-3 running-time">
                                            <hr class="space-10">
                                            135 mins <span class="certificate">18</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="sun" aria-labelledby="ui-id-7" role="tabpanel" class="ui-tabs-panel ui-corner-bottom ui-widget-content" aria-hidden="true" style="display: none;">
                            <div class="row movie-tabs">
                                <div class="col-md-2 col-sm-3">
                                    <a href="#">
                                        <img src="img/movie-5.jpg" alt="Movie title">
                                    </a>
                                </div>
                                <div class="col-md-10 col-sm-9">
                                    <span class="title">Action, Adventure, Sci-Fi </span>
                                    <h3 class="no-underline">Days of war</h3>
                                    <p>Steve Rogers, a rejected military soldier transforms into Captain America after taking a dose of a "Super-Soldier serum". But being Captain America comes at a price as he attempts to take down a war monger and a terrorist organization.</p>
                                    <p><a href="#" class="arrow-button">Full synopsis</a></p>
                                    <div class="row">
                                        <div class="col-md-8 col-sm-9">
                                            <hr class="space-10">
                                            <span class="viewing-times">
<i class="material-icons">access_time</i>
Viewing times
</span>
                                            <span class="time past">11:00</span>
                                            <span class="time">16:00</span>
                                            <span class="time">18:00</span>
                                            <span class="time">21:00</span>
                                        </div>
                                        <div class="col-md-4 col-sm-3 running-time">
                                            <hr class="space-10">
                                            120 mins <span class="certificate">PG</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row movie-tabs">
                                <div class="col-md-2 col-sm-3">
                                    <a href="#">
                                        <img src="img/movie-6.jpg" alt="Movie title">
                                    </a>
                                </div>
                                <div class="col-md-10 col-sm-9">
                                    <span class="title">Action, Adventure, Fantasy</span>
                                    <h3 class="no-underline">End of an era</h3>
                                    <p>European mercenaries searching for black powder become embroiled in the defense of End of an era of China against a horde of monstrous creatures.</p>
                                    <p><a href="#" class="arrow-button">Full synopsis</a></p>
                                    <div class="row">
                                        <div class="col-md-8 col-sm-9">
                                            <hr class="space-10">
                                            <span class="viewing-times">
<i class="material-icons">access_time</i>
Viewing times
</span>
                                            <span class="time past">14:45</span>
                                            <span class="time">18:30</span>
                                            <span class="time">20:30</span>
                                            <span class="time">24:45</span>
                                        </div>
                                        <div class="col-md-4 col-sm-3 running-time">
                                            <hr class="space-10">
                                            105 mins <span class="certificate">15</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row movie-tabs">
                                <div class="col-md-2 col-sm-3">
                                    <a href="#">
                                        <img src="img/movie-7.jpg" alt="Movie title">
                                    </a>
                                </div>
                                <div class="col-md-10 col-sm-9">
                                    <span class="title">Drama</span>
                                    <h3 class="no-underline">As she sleeps</h3>
                                    <p>A chronicle of the childhood, adolescence and burgeoning adulthood of a young black man growing up in a rough neighborhood of Miami.</p>
                                    <p><a href="#" class="arrow-button">Full synopsis</a></p>
                                    <div class="row">
                                        <div class="col-md-8 col-sm-9">
                                            <hr class="space-10">
                                            <span class="viewing-times">
<i class="material-icons">access_time</i>
Viewing times
</span>
                                            <span class="time past">11:00</span>
                                            <span class="time past">14:30</span>
                                            <span class="time">20:00</span>
                                            <span class="time">21:15</span>
                                        </div>
                                        <div class="col-md-4 col-sm-3 running-time">
                                            <hr class="space-10">
                                            117 mins <span class="certificate">U</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row movie-tabs">
                                <div class="col-md-2 col-sm-3">
                                    <a href="#">
                                        <img src="img/movie-8.jpg" alt="Movie title">
                                    </a>
                                </div>
                                <div class="col-md-10 col-sm-9">
                                    <span class="title">Drama</span>
                                    <h3 class="no-underline">The apocalypse</h3>
                                    <p>A working-class African-American father tries to raise his family in the 1950s, while coming to terms with the events of his life.</p>
                                    <p><a href="#" class="arrow-button">Full synopsis</a></p>
                                    <div class="row">
                                        <div class="col-md-8 col-sm-9">
                                            <hr class="space-10">
                                            <span class="viewing-times">
<i class="material-icons">access_time</i>
Viewing times
</span>
                                            <span class="time past">10:00</span>
                                            <span class="time past">12:45</span>
                                            <span class="time">17:00</span>
                                            <span class="time">21:15</span>
                                        </div>
                                        <div class="col-md-4 col-sm-3 running-time">
                                            <hr class="space-10">
                                            135 mins <span class="certificate">18</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        @include('footer')
    </div>
@endSection