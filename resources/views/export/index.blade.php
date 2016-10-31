@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
		<div class="col-md-8 col-md-offset-2">
		    <div class="col-md-12">
				<h2>Exportar radios</h2>
				<hr>
            </div>
            <div class="col-md-12">
            	<div class="panel panel-default">
            		<div class="panel-body">
            			<div class="media">
            			    <div class="media-body">
			            		<h4 class="media-heading">Tapin Radio</h4>
			            		Si utilizas el programa Tapin Radio para escuchar, puedes agregar todas nuestras radios a tus favoritos.
			            	</div><!-- .media-body -->
			            	<div class="media-right media-middle">
			            		<a class="btn btn-default" href="{{ url('export/xml/chaco.xml') }}" role="button">
			            			<i class="fa fa-file-code-o" aria-hidden="true"></i> Descargar
			            		</a>
			            	</div>
			            </div>
            		</div>
            	</div>
            </div>

		</div>
	</div>
</div>
@endsection