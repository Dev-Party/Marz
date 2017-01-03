@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $radio->name }} {{ $radio->frequency }} MHz
                </div>
                <ul class="list-group">
                    @foreach ($radio->notes as $note)
                    <li class="list-group-item"><small class="text-muted">{{ $note->created_at->format('h:i') }}</small> - <a href="/uploads/audios/{{ $note->audio }}" title="Descargar audio" target="_blank">{{ $note->title }}</a></li>
                    @endforeach
                </ul>
            </div><!-- .panel -->
        </div>
    </div>
</div>
@endsection