@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        	
        	@include('shared.message')

			<div class="panel panel-default">
				<div class="panel-heading">Perfil</div>

				<div class="panel-body">
					<form class="form-horizontal" role="form" method="POST" action="{{ url('account/settings/profile/' . $user->id) }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre y apellido</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Correo</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                        </div>
                    </form>
				</div><!-- .panel-body -->
			</div><!-- .panel -->

            <div class="panel panel-default">
                <div class="panel-heading">Cambia la contraseña</div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('account/settings/password') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">
                            <label for="old_password" class="col-md-4 control-label">Contraseña actual</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="old_password" value="">
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Nueva contraseña</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password" value="">
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password_confirmation" class="col-md-4 control-label">Confirmar nueva contraseña</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Actualiza contraseña</button>
                            </div>
                        </div>
                    </form>
                </div><!-- .panel-body -->
            </div><!-- .panel -->

        </div>
    </div><!-- .row -->
</div><!-- .container -->
@endsection