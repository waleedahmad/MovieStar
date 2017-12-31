<div class="tabs movies ui-tabs ui-corner-all ui-widget ui-widget-content">
    @php
        {{
            $days = [
                'sun',
                'mon',
                'tue',
                'wed',
                'thu',
                'fri',
                'sat',
            ];
            $today = \Carbon\Carbon::now();
        }}
    @endphp

    <ul role="tablist" class="ui-tabs-nav ui-corner-all ui-helper-reset ui-helper-clearfix ui-widget-header">
        @foreach($days as $day)
            @if($day === $days[$today->dayOfWeek])
                <li role="tab"
                    tabindex="0"
                    class="ui-tabs-tab ui-corner-top ui-state-default ui-tab ui-tabs-active ui-state-active"
                    aria-controls="{{$day}}"
                    aria-labelledby="ui-id-{{$loop->iteration}}"
                    aria-selected="true"
                    aria-expanded="true">
                    <a href="#{{$day}}"
                       role="presentation"
                       tabindex="-1"
                       class="ui-tabs-anchor"
                       id="ui-id-{{$loop->iteration}}">
                        {{$day}}
                    </a>
                </li>

            @else
                <li role="tab"
                    tabindex="0"
                    class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"
                    aria-controls="{{$day}}"
                    aria-labelledby="ui-id-{{$loop->iteration}}"
                    aria-selected="false"
                    aria-expanded="false">
                    <a href="#{{$day}}"
                       role="presentation"
                       tabindex="-1"
                       class="ui-tabs-anchor"
                       id="ui-id-{{$loop->iteration}}">
                        {{$day}}
                    </a>
                </li>
            @endif
        @endforeach
    </ul>

    @foreach($days as $day)
        <div id="{{$day}}" aria-labelledby="ui-id-{{$loop->iteration}}" role="tabpanel" class="ui-tabs-panel ui-corner-bottom ui-widget-content" aria-hidden="true" style="display: none;">
            @foreach($schedule as $screening)
                @if($days[\Carbon\Carbon::parse($screening->show_time)->dayOfWeek] === $day)
                    @include('screenings.screening')
                @endif
            @endforeach
        </div>
    @endforeach
</div>