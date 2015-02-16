@extends('app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>
                {{$band->name}}
                <small>modification</small>
            </h1>
        </div>

        {!! Form::model($band, ['method' => 'PATCH', 'route' => ['bands.update', $band->id]]) !!}
        @include('forms.band', ['submitButtonText' => 'Enregistrer les modifications'])
        {!! Form::close() !!}

        @include('errors.list')
    </div>
@stop
