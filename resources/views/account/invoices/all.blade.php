@extends('layouts.dashboard')

@section('content.dashboard')
<div class="panel panel-default">

	<div class="panel-heading">Mis facturas</div>

	<div class="panel-body">
		@if ($invoices->count() > 0)
	    <table class="table">
	      <thead>
	        <tr>
	        	<th></th>
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
	        	<td><i class="fa fa-circle {{ $invoice->active ? 'text-success' : 'text-muted' }}" aria-hidden="true"></i></td>
	        	<td>{{ $invoice->id }}</td>
	        	<td>{{ $invoice->created_at->format('d/m/Y') }}</td>
	        	<td>Streaming de Audio</td>
	        	<td>$ 70,00</td>
	        	<td><a href="{{ url('/account/invoice/' . $invoice->id . '.pdf') }}" target="_blank">Ver factura</a></td>
	        </tr>
	        @endforeach
	      </tbody>
	    </table>
	   	@else
	    <h4 class="lead text-muted text-center">No hay facturas.</h4>
	    @endif
	</div><!-- .panel-body -->
</div><!-- .panel -->
@endsection
