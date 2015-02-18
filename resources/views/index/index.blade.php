@extends('app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>
                MyZik
            </h1>
            @if(Auth::user())
                <div class="text-right">
                    <a href="{{route('bands.create')}}" class="btn btn-primary">Nouveau groupe</a>
                </div>
            @endif
        </div>

        <h2>Derniers groupes ajoutés</h2>
        @include('band._list', ['bands' => $bands])

        <h2>Derniers enregistrements ajoutés</h2>
        @include('record._list', ['records' => $records])

        <h2>Derniers artistes ajoutés</h2>

        <h2>Derniers labels ajoutés</h2>

    </div>
@endsection
