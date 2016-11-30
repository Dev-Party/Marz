@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                  <div class="panel-body">
                    <audio src="http://138.197.29.213:8000/live" controls="true"></audio>
                  </div>
            </div>
        </div>
    </div><!-- .row -->
</div><!-- .container -->
@endsection