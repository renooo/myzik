<div class="form-group{{ ($errors->has('name') ? ' has-error' : '') }}">
    {!! Form::label('name', 'Nom :') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('country_id', 'Pays :') !!}
    {!! Form::select('country_id', $countries, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('genre_list', 'Genre(s) :') !!}
    {!! Form::select('genre_list[]', $genres, null, ['id' => 'genre_list', 'class' => 'form-control', 'multiple']) !!}
</div>

<div class="form-group">
    {!! Form::label('active', 'Actuellement actif :') !!}
    {!! Form::checkbox('active') !!}
</div>

<div class="row">
    <div class="col-md-6 form-group{{ ($errors->has('active_from') ? ' has-error' : '') }}">
        {!! Form::label('active_from', 'Actif depuis le :') !!}
        {!! Form::input('date', 'active_from', null, ['class' => 'form-control']) !!}
    </div>

    <div class="col-md-6 form-group{{ ($errors->has('active_to') ? ' has-error' : '') }}">
        {!! Form::label('active_to', 'jusqu\'au :') !!}
        {!! Form::input('date', 'active_to', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group{{ ($errors->has('biography') ? ' has-error' : '') }}">
    {!! Form::label('biography', 'Biographie :') !!}
    {!! Form::textarea('biography', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group text-center">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
    <a class="btn" href="{{route('bands.index')}}" onclick="return confirm('Êtes-vous certain(e) de vouloir quitter cette page sans sauvegarder ?')">Annuler</a>
</div>

@section('footer')
    <script>
        $('#genre_list').select2();
    </script>
@endsection