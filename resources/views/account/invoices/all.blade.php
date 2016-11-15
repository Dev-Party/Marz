@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
			  <div class="panel-body">
			  	<h4>Historial de facturas</h4>
			    <table class="table">
			      <thead>
			        <tr>
			        	<th>#</th>
			          	<th>Fecha</th>
			          	<th>Descripción</th>
			          	<th>Cantidad</th>
			          	<th></th>
			        </tr>
			      </thead>
			      <tbody>
			      	@foreach ($invoices as $invoice)
			        <tr>
			        	<td>{{ $invoice->id }}</td>
			          <td>{{ $invoice->created_at->format('d/m/Y') }}</td>
			          <td>Streaming de Audio</td>
			          <td>$ 70,00</td>
			          <td><a href="{{ url('/account/invoice/' . $invoice->id . '.pdf') }}" target="_blank">Ver factura</a></td>
			        </tr>
			        @endforeach
			      </tbody>
			    </table>
			  </div><!-- .panel-body -->
			</div><!-- .panel -->
		</div>
        </div>
    </div>
</div>
@endsection
