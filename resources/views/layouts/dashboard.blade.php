@extends('layouts.app')

@section('title', 'Panel principal')

@section('content')
<div class="container">
  <div class="row">
  	<div class="col-md-3">
  		<ul class="nav nav-pills nav-stacked">
  			<li role="presentation" {{ Request::is('dashboard/users*') ? 'class=active' : '' }}><a href="/dashboard/users">Usuarios</a></li>
        <li role="presentation" {{ Request::is('dashboard/notes*') ? 'class=active' : '' }}><a href="/dashboard/notes">Notas</a></li>
        <li role="presentation" {{ Request::is('dashboard/radios*') ? 'class=active' : '' }}><a href="/dashboard/users">Radios</a></li>
  		</ul>
  	</div>
  	<div class="col-md-9">
  		@yield('content.dashboard')
  	</div>
  </div><!-- .row -->
</div>
@endsection