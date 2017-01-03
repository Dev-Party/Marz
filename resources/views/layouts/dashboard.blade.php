@extends('layouts.app')

@section('title', 'Panel principal')

@section('content')
<div class="container">
  <div class="row">
  	<div class="col-md-3">
      <div class="list-group">
        @if (Auth::user()->hasRole('administrator'))
        <a href="{{ url('/dashboard/users') }}" class="list-group-item{{ Request::is('dashboard/users*') ? ' active' : '' }}">Usuarios</a>
        <a href="{{ url('/dashboard/notes') }}" class="list-group-item{{ Request::is('dashboard/notes*') ? ' active' : '' }}">Notas</a>
        <a href="{{ url('/dashboard/radios') }}" class="list-group-item{{ Request::is('dashboard/radios*') ? ' active' : '' }}">Radios</a>
        @endif
        <a href="{{ url('/account/invoices') }}" class="list-group-item{{ Request::is('account/invoices*') ? ' active' : '' }}">Facturas</a>
        <a href="{{ url('/account/settings') }}" class="list-group-item{{ Request::is('account/settings*') ? ' active' : '' }}">Ajustes</a>
      </div>
  	</div>
  	<div class="col-md-9">
  		@yield('content.dashboard')
  	</div>
  </div><!-- .row -->
</div>
@endsection