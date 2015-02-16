@extends('app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>
               Nouveau groupe
            </h1>
        </div>

        {!! Form::open(['route' => ['bands.store']]) !!}
        @include('forms.band', ['submitButtonText' => 'Ajouter ce groupe'])
        {!! Form::close() !!}

        @include('errors.list')
    </div>
@stop
