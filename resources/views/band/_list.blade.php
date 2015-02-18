@foreach($bands as $band)
    <div class="panel panel-default">
        <div class="panel-body row">
            <div class="col-md-2 text-center">
                <img class="img-thumbnail" src="{{$band->logo or 'images/placeholder_140x140.svg'}}" />
            </div>
            <div class="col-md-10">
                <h3>{{$band->name}}</h3>
                <p>{{$band->biography}}</p>
                <div class="text-right">
                    @if(Auth::user() && Auth::id() == $band->user_id)
                        <a class="btn" href="{{route('bands.edit', ['band' => $band])}}">Modifier</a>
                    @endif
                    <a class="btn btn-primary" href="{{route('bands.show', ['band' => $band])}}">Voir la page</a>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            @include('band._genres', ['band' => $band])
        </div>
    </div>
@endforeach
