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

        @include('band._list', ['bands' => $bands])

        <div class="row">
            <div class="col-md-12">
                {!! $bands->render() !!}
            </div>
        </div>
    </div>
@stop
