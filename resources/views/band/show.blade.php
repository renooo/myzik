@extends('app')

@section('content')
<h1>{{ $band->name  }}</h1>

<div>Actif : {{ $band->active_from }}</div>
@stop
