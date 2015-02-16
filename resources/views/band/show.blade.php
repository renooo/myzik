@extends('app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>
                {{$band->name}}
                @if(false)
                    <small></small>
                @endif
            </h1>
        </div>
        <div>
            @include('band._genres', ['band' => $band])
        </div>
        <div>
            @include('band._country', ['band' => $band])
        </div>
        <h2>Biographie</h2>
        <p>
            {{$band->biography}}
        </p>
    </div>
@stop
