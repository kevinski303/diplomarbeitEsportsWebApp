@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.game.title')</h3>
    
    {!! Form::model($game, ['method' => 'PUT', 'route' => ['admin.games.update', $game->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('beginn', trans('quickadmin.game.fields.beginn').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('beginn', old('beginn'), ['class' => 'form-control datetime', 'placeholder' => '', 'required' => '']) !!}
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
                    {!! Form::label('tournament_id', trans('quickadmin.game.fields.tournament').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('tournament_id', $tournaments, old('tournament_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('tournament_id'))
                        <p class="help-block">
                            {{ $errors->first('tournament_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('team1_id', trans('quickadmin.game.fields.team1').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('team1_id', $team1s, old('team1_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('team1_id'))
                        <p class="help-block">
                            {{ $errors->first('team1_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('team2_id', trans('quickadmin.game.fields.team2').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('team2_id', $team2s, old('team2_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('team2_id'))
                        <p class="help-block">
                            {{ $errors->first('team2_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('pointsteam1', trans('quickadmin.game.fields.pointsteam1').'', ['class' => 'control-label']) !!}
                    {!! Form::number('pointsteam1', old('pointsteam1'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('pointsteam1'))
                        <p class="help-block">
                            {{ $errors->first('pointsteam1') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('pointsteam2', trans('quickadmin.game.fields.pointsteam2').'', ['class' => 'control-label']) !!}
                    {!! Form::number('pointsteam2', old('pointsteam2'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('pointsteam2'))
                        <p class="help-block">
                            {{ $errors->first('pointsteam2') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
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
            
            $('.datetime').datetimepicker({
                format: "{{ config('app.datetime_format_moment') }}",
                locale: "{{ App::getLocale() }}",
                sideBySide: true,
            });
            
        });
    </script>
            
@stop