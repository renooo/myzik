@if($band->country)
Pays : <a href="{{route('bands.index', ['country' => $band->country])}}">{{$band->country->name}}</a>
@else
Pays inconnu
@endif