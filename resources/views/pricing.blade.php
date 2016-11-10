@extends('layouts.app')

@section('content')
<div class="container">
    <div class="pricing row">
        <div class="col-md-10 col-md-offset-1">
            <div class="col-md-12 text-center">
                <i class="fa fa-play-circle-o" style="color: #3097D1; font-size: 68px;" aria-hidden="true"></i>
                <h3 class="text-muted text-uppercase" style="color: #e04e50;">Tu Radio en Internet</h3>
                <h2>Haga que más personas escuchen su radio</h2>
                <br><br>
            </div>
            <div class="col-md-8 text-rigth">
                <h4 class="text-primary text-uppercase">Activación rápida</h4>
                <p class="lead">Para que no tengas que preocuparte por nada. Te ayudamos de forma remota en las configuraciones.</p>
                <h4 class="text-primary text-uppercase">Soporte 24hs</h4>
                <p class="lead">Un maravilloso equipo dispuesto a ayudarte cuando más lo necesites.</p>
                <h4 class="text-primary text-uppercase">Estabilidad 99,99%</h4>
                <p class="lead">Gracias a nuestros puertos conectados mundialmente a múltiples proveedores de ancho de banda.</p>
                <h4 class="text-primary text-uppercase">La mejor calidad de sonido</h4>
                <p class="lead">Transmisiones con calidad de alta definición de hasta 128 kbps stereo.</p>
                <h4 class="text-primary text-uppercase">Múltiples aplicaciones</h4>
                <p class="lead">Sus oyentes pueden escuchar en cualquier lugar en el mundo: PC, navegador, dispositivo móvil, tablet, TV, etc.</p>
            </div>
            <div class="col-md-4">
            @include('partials.pricing-streaming-audio')
            <aside class="text-center">
                <h4>Formas de pagos</h4>
                <img src="/img/pagoexpresscargas.jpg" class="img-responsive">
            </aside>
            </div>
        </div>
    </div><!-- .row -->
</div><!-- .container -->
@endsection