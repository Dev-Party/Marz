@extends('layouts.dashboard')

@section('title', 'Agregar una nota')

@section('content.dashboard')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
            <div class="col-md-12">
                <h2>Agregar una nota</h2>
                <hr>
            </div>
            <div class="col-md-12">
                <form role="form" method="POST" action="{{ url('/notes/new') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title" class="control-label">Título</label>
                        <input name="title" type="text" class="form-control" value="" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="radio_id" class="control-label">radio_id</label>
                        <input name="radio_id" type="text" class="form-control" value="">
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