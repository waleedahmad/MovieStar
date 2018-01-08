<div class="row movie-tabs">
    <div class="col-md-2 col-sm-3">
        <a href="/screenings/{{$screening->id}}">
            <img src="{{'/storage/'.$screening->movie->details->image_uri}}" alt="{{$screening->movie->name}}">
        </a>
    </div>
    <div class="col-md-10 col-sm-9">
        <span class="title">
            @foreach($screening->movie->genre as $genre)
                @if($loop->iteration != 1),@endif {{$genre->info->name}}
            @endforeach
        </span>

        <h3 class="no-underline">{{$screening->movie->name}}</h3>
        <p>{{$screening->movie->details->description}}</p>
        <p><a href="/movie/{{$screening->movie->id}}" class="arrow-button">Full synopsis</a></p>
        <div class="row">
            <div class="col-md-8 col-sm-9">
                <hr class="space-10">
                <span class="viewing-times">
                    <i class="material-icons">access_time</i>
                    Viewing times
                </span>
{{--
                <span class="time past">14:45</span>
--}}

                @foreach($screening->movie->screens as $s)
                    @if($days[\Carbon\Carbon::parse($s->show_time)->dayOfWeek] === $day)
                    <div class="time">
                        {{\Carbon\Carbon::parse($s->show_time)->toDayDateTimeString()}}
                        <a href="/reserve/screening/{{$screening->id}}" style="float:right;">
                            Reserve Tickets
                        </a>
                    </div>
                    @endif
                @endforeach

            </div>
            <div class="col-md-4 col-sm-3 running-time">
                <hr class="space-10">
                {{$screening->movie->details->running_time}} mins
                <span class="certificate">{{$screening->movie->details->audience}}</span>
            </div>
        </div>
    </div>
</div>