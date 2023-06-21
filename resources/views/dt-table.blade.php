@if(isset($data))
    <ul>
        @foreach($data as $key => $values)
            <li><a href="{{ url('shortenLink/'.$values["short_code"]) }}" target="_blank">{{$values['short_url']}}/{{$values['short_code']}}</a></li>
        @endforeach
    </ul>
@endif