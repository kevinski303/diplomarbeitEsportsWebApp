@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.team.title')</h3>
    
    {!! Form::model($team, ['method' => 'PUT', 'route' => ['admin.teams.update', $team->id], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', trans('quickadmin.team.fields.name').'*', ['class' => 'control-label']) !!}
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
                    {!! Form::label('shortname', trans('quickadmin.team.fields.shortname').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('shortname', old('shortname'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('shortname'))
                        <p class="help-block">
                            {{ $errors->first('shortname') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('twitterlink', trans('quickadmin.team.fields.twitterlink').'', ['class' => 'control-label']) !!}
                    {!! Form::text('twitterlink', old('twitterlink'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('twitterlink'))
                        <p class="help-block">
                            {{ $errors->first('twitterlink') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('streamlink', trans('quickadmin.team.fields.streamlink').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('www', trans('quickadmin.team.fields.www').'', ['class' => 'control-label']) !!}
                    {!! Form::text('www', old('www'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('www'))
                        <p class="help-block">
                            {{ $errors->first('www') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    @if ($team->logo)
                        <a href="{{ asset(env('UPLOAD_PATH').'/'.$team->logo) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/'.$team->logo) }}"></a>
                    @endif
                    {!! Form::label('logo', trans('quickadmin.team.fields.logo').'', ['class' => 'control-label']) !!}
                    {!! Form::file('logo', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                    {!! Form::hidden('logo_max_size', 5) !!}
                    {!! Form::hidden('logo_max_width', 4096) !!}
                    {!! Form::hidden('logo_max_height', 4096) !!}
                    <p class="help-block"></p>
                    @if($errors->has('logo'))
                        <p class="help-block">
                            {{ $errors->first('logo') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

