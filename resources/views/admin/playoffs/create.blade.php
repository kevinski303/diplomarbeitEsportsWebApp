@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.playoff.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.playoffs.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('playofftournament_id', trans('quickadmin.playoff.fields.playofftournament').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('playofftournament_id', $playofftournaments, old('playofftournament_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('playofftournament_id'))
                        <p class="help-block">
                            {{ $errors->first('playofftournament_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('seasontournament_id', trans('quickadmin.playoff.fields.seasontournament').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('seasontournament_id', $seasontournaments, old('seasontournament_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('seasontournament_id'))
                        <p class="help-block">
                            {{ $errors->first('seasontournament_id') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

