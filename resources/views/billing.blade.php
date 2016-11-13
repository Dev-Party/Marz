@extends('layouts.app')

@section('content')
<div class="container">
    <div class="billing row">
        <div class="col-md-8 col-md-offset-2">
            <div class="row">
                <div class="col-md-12 text-center">
                    <i class="fa fa fa-cube" style="color: #3097D1; font-size: 68px;" aria-hidden="true"></i>
                    <h3 class="text-muted text-uppercase" style="color: #e04e50;">Tu Radio en Internet</h3>
                    <h2>Mis Compras</h2>
                    <br><br>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th class="text-center">Periodo</th>
                                <th class="text-center">Precio Unitario</th>
                                <th class="text-center">Sub-Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="lead">
                                <td><strong>Streaming de Audio</strong><br> <small class="text-muted">Radio Internet 50 oyentes</small></td>
                                <td>1 Mes</td>
                                <td>$ 70,00 /mes</td>
                                <td class="text-right">$ 70,00</td>
                            </tr>
                        </tbody>
                    </table>   
                    <hr>             
                </div>
                <div class="col-md-7">
                    <h4>Tus datos</h4>
                    <form role="form" method="POST" action="{{ url('/billing') }}">
                    {{ csrf_field() }}
                    @if (Auth::guest())
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <input name="name" type="text" class="form-control" value="{{ old('name') }}" placeholder="Nombre y apellido">
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input name="email" type="email" class="form-control" value="{{ old('email') }}" placeholder="Correo">
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input name="password" type="password" class="form-control" value="{{ old('password') }}" placeholder="Contraseña">
                        </div>
                    @else
                        <ul class="list-unstyled">
                            <li>{{ Auth::user()->name }}</li>
                            <li>{{ Auth::user()->email }}</li>
                        </ul>
                    @endif
                        <hr>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-lg btn-block text-uppercase">Continuar <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                        </div>
                        <div class="form-group">
                            <small class="text-muted">Al hacer clic en "Continuar", acepta nuestras <a href="{{ url('/terms-and-conditions') }}">condiciones de servicio</a> y política de privacidad.</small>
                        </div>
                    </form>
                </div>
                <div class="col-md-5">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="text-center">
                                <h4>Total a pagar:</h4>
                                <span style="font-size: 58px; color: #17bf63;">$70</span>
                                <small class="text-uppercase">x mes</small>
                                <ul class="list-unstyled text-muted">
                                    <li>Pesos Argentinos</li>
                                    <li>IVA Incluído</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <aside class="text-center">
                        <h4>Formas de pagos</h4>
                        <img src="/img/pagoexpresscargas.jpg" class="img-responsive">
                    </aside>
                </div>
            </div>
        </div>
    </div><!-- .row -->
</div><!-- .container -->
@endsection