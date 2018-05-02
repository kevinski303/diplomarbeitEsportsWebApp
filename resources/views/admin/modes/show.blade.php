@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.mode.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.mode.fields.tournamentmode')</th>
                            <td field-key='tournamentmode'>{{ $mode->tournamentmode }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#tournament" aria-controls="tournament" role="tab" data-toggle="tab">Tournament</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="tournament">
<table class="table table-bordered table-striped {{ count($tournaments) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.tournament.fields.name')</th>
                        <th>@lang('quickadmin.tournament.fields.beginn')</th>
                        <th>@lang('quickadmin.tournament.fields.end')</th>
                        <th>@lang('quickadmin.tournament.fields.public')</th>
                        <th>@lang('quickadmin.tournament.fields.tournamentmode')</th>
                        <th>@lang('quickadmin.tournament.fields.streamlink')</th>
                        <th>@lang('quickadmin.tournament.fields.winner')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($tournaments) > 0)
            @foreach ($tournaments as $tournament)
                <tr data-entry-id="{{ $tournament->id }}">
                    <td field-key='name'>{{ $tournament->name }}</td>
                                <td field-key='beginn'>{{ $tournament->beginn }}</td>
                                <td field-key='end'>{{ $tournament->end }}</td>
                                <td field-key='public'>{{ Form::checkbox("public", 1, $tournament->public == 1 ? true : false, ["disabled"]) }}</td>
                                <td field-key='tournamentmode'>{{ $tournament->tournamentmode->tournamentmode or '' }}</td>
                                <td field-key='streamlink'>{{ $tournament->streamlink }}</td>
                                <td field-key='winner'>{{ $tournament->winner->name or '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['tournaments.restore', $tournament->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['tournaments.perma_del', $tournament->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('view')
                                    <a href="{{ route('tournaments.show',[$tournament->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('edit')
                                    <a href="{{ route('tournaments.edit',[$tournament->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['tournaments.destroy', $tournament->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="12">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.modes.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
