@extends('layouts.app')

@section('content')
 <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Agregar una nueva radio. Gratis!</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/new') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('frequency') ? ' has-error' : '' }}">
                            <label for="frequency" class="col-md-4 control-label">Frequency</label>

                            <div class="col-md-6">
                                <input id="frequency" type="text" class="form-control" name="frequency" value="{{ old('frequency') }}" required>

                                @if ($errors->has('frequency'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('frequency') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('modulation_id') ? ' has-error' : '' }}">
                            <label for="modulation_id" class="col-md-4 control-label">modulation_id</label>

                            <div class="col-md-6">
                                <input id="modulation_id" type="text" class="form-control" name="modulation_id" value="{{ old('modulation_id') }}" required>

                                @if ($errors->has('modulation_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('modulation_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('streaming') ? ' has-error' : '' }}">
                            <label for="streaming" class="col-md-4 control-label">streaming</label>

                            <div class="col-md-6">
                                <input id="streaming" type="text" class="form-control" name="streaming" value="{{ old('streaming') }}" required>

                                @if ($errors->has('streaming'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('streaming') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('state_id') ? ' has-error' : '' }}">
                            <label for="state_id" class="col-md-4 control-label">state_id</label>

                            <div class="col-md-6">
                                <input id="state_id" type="text" class="form-control" name="state_id" value="{{ old('state_id') }}" required>

                                @if ($errors->has('state_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('state_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('city_id') ? ' has-error' : '' }}">
                            <label for="city_id" class="col-md-4 control-label">city_id</label>

                            <div class="col-md-6">
                                <input id="city_id" type="text" class="form-control" name="city_id" value="{{ old('city_id') }}" required>

                                @if ($errors->has('city_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection