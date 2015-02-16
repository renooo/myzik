@extends('app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>
                Parcourir les groupes
                @if($genre)
                    <small>{{$genre->name}}</small>
                @elseif($country)
                    <small>{{$country->name}}</small>
                @endif
            </h1>
            @if(Auth::user())
                <div class="text-right">
                    <a href="{{route('bands.create')}}" class="btn btn-primary">Nouveau groupe</a>
                </div>
            @endif
        </div>

        @if($genre)
        {!! Breadcrumbs::render('bands.genre', $genre) !!}
        @elseif($country)
        {!! Breadcrumbs::render('bands.country', $country) !!}
        @else
        {!! Breadcrumbs::render('bands') !!}
        @endif

        @unless(count($bands))
        <div class="alert alert-info" role="alert">Aucun groupe pour le moment.</div>
        @endunless

        <div>
            Total : {{$bands->total()}}
        </div>


        @foreach($bands as $band)
        <div class="panel panel-default">
            <div class="panel-body row">
                <div class="col-md-2 text-center">
                    @if($band->logo)
                    <img class="img-thumbnail" src="{{$band->logo}}" />
                    @else
                    <img class="img-thumbnail" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ0LjA0Njg3NSIgeT0iNzAiIHN0eWxlPSJmaWxsOiNBQUFBQUE7Zm9udC13ZWlnaHQ6Ym9sZDtmb250LWZhbWlseTpBcmlhbCwgSGVsdmV0aWNhLCBPcGVuIFNhbnMsIHNhbnMtc2VyaWYsIG1vbm9zcGFjZTtmb250LXNpemU6MTBwdDtkb21pbmFudC1iYXNlbGluZTpjZW50cmFsIj4xNDB4MTQwPC90ZXh0PjwvZz48L3N2Zz4=" />
                    @endif
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

        <div class="row">
            <div class="col-md-12">
                {!! $bands->render() !!}
            </div>
        </div>
    </div>
@stop
