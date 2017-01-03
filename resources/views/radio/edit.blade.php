@extends('layouts.app')

@section('title', 'Editar radio')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar radio</div>
                <div class="panel-body">
                    <form-radio :id="{{ $radio_id }}"></form-radio>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection