@extends('layouts.app')

@section('content')
<div class="container">
    <div class="billing row">
        <div class="col-md-8 col-md-offset-2">
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
                        <tr class="lead active">
                            <td></td>
                            <td></td>
                            <td class="text-right">Total:</td>
                            <td class="text-right"><strong>$ 70,00</strong></td>
                        </tr>
                    </tbody>
                </table>   
                <hr>             
            </div>
            <div class="col-md-7">
                 <h4>Ingresa tus datos</h4>
                 <form>

                    <div class="form-group">
                        <label for="name" class="control-label">Nombre y apellido</label>
                        <input type="text" class="form-control" value="" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="email" class="control-label">Correo</label>
                        <input type="email" class="form-control" value="" placeholder="contacto@radio.com">
                    </div>

                    <div class="form-group">
                        <label for="phone" class="control-label">Teléfono</label>
                        <input type="text" class="form-control" value="" placeholder="(000) 000-0000">
                    </div>
                    <hr>
                    <div class="form-group">
                        <button type="button" class="btn btn-success btn-lg btn-block text-uppercase">Continuar <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
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
    </div><!-- .row -->
</div><!-- .container -->
@endsection