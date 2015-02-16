@if(count($band->genres))
    Genres :
    @foreach($band->genres as $g => $genre)
        <a href="{{route('bands.index', ['genre' => $genre->id])}}">
            {{$genre->name}}
        </a>
        @if($g != count($band->genres)-1)
            /
        @endif
    @endforeach
@endif