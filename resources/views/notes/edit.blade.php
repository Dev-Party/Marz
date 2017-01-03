@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
            <div class="col-md-12">
                <h2>Editar nota</h2>
                <hr>
            </div>
            <div class="col-md-12">
                <form role="form" method="POST" action="{{ url('/notes/edit/' . $note->id) }}" accept-charset="UTF-8" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title" class="control-label">Título</label>
                        <input name="title" type="text" class="form-control" value="{{ $note->title }}" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="radio_id" class="control-label">radio_id</label>
                        <input name="radio_id" type="text" class="form-control" value="{{ $note->radio_id }}">
                    </div>
                    @if ($note->audio)
                    <a href="{{ url('uploads/audios/' . $note->audio) }}">{{ $note->audio }}</a>
                    @endif
                    <div class="form-group">
                        <label for="audio">Audio</label>
                        <input name="audio" type="file" id="audio">
                        <p class="help-block">Formatos: .mp3 o .waw</p>
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
	</div><!-- .row -->
</div><!-- .container -->
@endsection