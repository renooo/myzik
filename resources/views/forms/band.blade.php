<div class="form-group">
    {!! Form::label('name', 'Nom :') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('country_id', 'Pays :') !!}
    {!! Form::select('country_id', $countries, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('active', 'Actuellement actif :') !!}
    {!! Form::checkbox('active') !!}
</div>

<div class="form-group">
    {!! Form::label('active_from', 'Actif depuis le :') !!}
    {!! Form::input('date', 'active_from', null, ['class' => 'form-control']) !!}

    {!! Form::label('active_to', 'jusqu\'au :') !!}
    {!! Form::input('date', 'active_to', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('biography', 'Biographie :') !!}
    {!! Form::textarea('biography', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group text-center">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
    <a class="btn" href="{{route('bands.index')}}" onclick="return confirm('Êtes-vous certain(e) de vouloir quitter cette page sans sauvegarder ?')">Annuler</a>
</div>
