@extends('layouts.dashboard')

@section('title', 'Notas')

@section('content.dashboard')
<div class="panel panel-default">
    <div class="panel-heading">Notas</div>
	<div class="panel-body">
		@if ($notes->count() > 0)
		<ul class="list-group">
        	@foreach ($notes as $note)
        	@if ($note->audio)
        	<li class="list-group-item"><small class="text-muted">{{ $note->created_at->format('h:i') }}</small> - <a href="/uploads/audios/{{ $note->audio }}" title="Descargar audio" target="_blank">{{ $note->title }}</a> / <small>{{ $note->radio->name }} {{ $note->radio->frequency }} MHz</small></li>
        	@endif
        	@endforeach
    	</ul>
	    @else
	    <h4 class="lead text-muted text-center">No hay notas.</h4>
	    @endif
	</div><!-- .panel-body -->
</div><!-- .panel -->
@endsection
