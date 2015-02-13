

<h1>Bands</h1>

<ul>
@foreach($bands as $band)

   <li><a href="{{route('bands.show', ['band' => $band])}}">{{$band->name}}</a></li>

@endforeach
</ul>
