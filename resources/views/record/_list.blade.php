@foreach($records as $record)
    <div class="panel panel-default">
        <div class="panel-body row">
            <div class="col-md-2 text-center">
                <img class="img-thumbnail" src="{{$record->cover_front or 'images/placeholder_140x140.svg'}}" />
            </div>
            <div class="col-md-10">
                <h3>{{$record->name}}</h3>
                <div>De : {!! link_to_route('bands.show', $record->band->name, ['band' => $record->band]) !!}</div>
                @if($record->release_date)
                <div>Sorti le : <span class="text-primary">{{$record->release_date->format('d/m/Y')}}</span></div>
                @endif
                @if($record->label)
                <div>Sur le label : {!! link_to_route('labels.show', $record->label->name, ['label' => $record->label]) !!}</div>
                @endif
                <div>Morceaux :</div>
                <ol>
                    @foreach($record->tracks as $track)
                    <li><span class="text-primary">{{$track->name}}</span> (<strong>{{$track->duration}}</strong>)</li>
                    @endforeach
                </ol>
                <div class="text-right">
                    @if(Auth::user() && Auth::id() == $record->user_id)
                        <a class="btn" href="{{route('records.edit', ['record' => $record])}}">Modifier</a>
                    @endif
                    <a class="btn btn-primary" href="{{route('records.show', ['record' => $record])}}">Voir la page</a>
                </div>
            </div>
        </div>
        <div class="panel-footer text-right">
            Durée totale : <strong>{{$record->total_duration}}</strong>
        </div>
    </div>
@endforeach
