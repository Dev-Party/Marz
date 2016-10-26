@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="col-md-12">
                <h2>Agregar una radio</h2>
                <hr>
            </div>
            <div class="col-md-8">
                <create-radio></create-radio>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default bg-info">
                    <div class="panel-body">
                        <h4 class="text-primary"><i class="fa fa-info-circle" aria-hidden="true"></i> Info</h4>
                        <p>Una vez guardados los datos de la radio, la misma quedará pendiente de ser verificada por un administrador.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection