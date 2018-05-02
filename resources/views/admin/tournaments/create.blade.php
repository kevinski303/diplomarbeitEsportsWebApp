@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.tournament.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.tournaments.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', trans('quickadmin.tournament.fields.name').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('beginn', trans('quickadmin.tournament.fields.beginn').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('beginn', old('beginn'), ['class' => 'form-control date', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('beginn'))
                        <p class="help-block">
                            {{ $errors->first('beginn') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('end', trans('quickadmin.tournament.fields.end').'', ['class' => 'control-label']) !!}
                    {!! Form::text('end', old('end'), ['class' => 'form-control date', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('end'))
                        <p class="help-block">
                            {{ $errors->first('end') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('public', trans('quickadmin.tournament.fields.public').'*', ['class' => 'control-label']) !!}
                    {!! Form::hidden('public', 0) !!}
                    {!! Form::checkbox('public', 1, old('public', true), ['required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('public'))
                        <p class="help-block">
                            {{ $errors->first('public') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('tournamentmode_id', trans('quickadmin.tournament.fields.tournamentmode').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('tournamentmode_id', $tournamentmodes, old('tournamentmode_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('tournamentmode_id'))
                        <p class="help-block">
                            {{ $errors->first('tournamentmode_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('streamlink', trans('quickadmin.tournament.fields.streamlink').'', ['class' => 'control-label']) !!}
                    {!! Form::text('streamlink', old('streamlink'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('streamlink'))
                        <p class="help-block">
                            {{ $errors->first('streamlink') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('winner_id', trans('quickadmin.tournament.fields.winner').'', ['class' => 'control-label']) !!}
                    {!! Form::select('winner_id', $winners, old('winner_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('winner_id'))
                        <p class="help-block">
                            {{ $errors->first('winner_id') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent

    <script src="{{ url('adminlte/plugins/datetimepicker/moment-with-locales.min.js') }}"></script>
    <script src="{{ url('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $(function(){
            moment.updateLocale('{{ App::getLocale() }}', {
                week: { dow: 1 } // Monday is the first day of the week
            });
            
            $('.date').datetimepicker({
                format: "{{ config('app.date_format_moment') }}",
                locale: "{{ App::getLocale() }}",
            });
            
        });
    </script>
            
@stop