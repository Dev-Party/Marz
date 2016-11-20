@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">Notas</div>

				<div class="panel-body">
					@if ($notes->count() > 0)
				    <table class="table">
				    	<thead>
				    		<tr>
				    			<th></th>
				    			<th>Título</th>
				    			<th>Radio</th>
				    		</tr>
				    	</thead>
				    	<tbody>
					      	@foreach ($notes as $note)
					      	@if ($note->audio != '')
					        <tr>
					        	<td class="text-muted"><small><em>{{ $note->created_at->format('h:i') }}</em></small></td>
					        	<td><a href="{{ url('uploads/audios/' . $note->audio) }}">{{ $note->title }}</a></td>
					        	<td><small>{{ $note->radio->name }} {{ $note->radio->frequency }} MHz</small></td>
					        </tr>
					        @endif
					        @endforeach
				        </tbody>
				    </table>
				    @else
				    <h4 class="lead text-muted text-center">No hay notas.</h4>
				    @endif
				</div><!-- .panel-body -->
			</div><!-- .panel -->
		</div><!-- .col -->
    </div><!-- .row -->
</div><!-- .container -->
@endsection
