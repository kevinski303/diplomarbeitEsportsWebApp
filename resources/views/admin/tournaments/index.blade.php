@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.tournament.title')</h3>
    @can('tournament_create')
    <p>
        <a href="{{ route('admin.tournaments.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    @can('tournament_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.tournaments.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.tournaments.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($tournaments) > 0 ? 'datatable' : '' }} @can('tournament_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('tournament_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

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
                                @can('tournament_delete')
                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                                @endcan

                                <td field-key='name'>{{ $tournament->name }}</td>
                                <td field-key='beginn'>{{ $tournament->beginn }}</td>
                                <td field-key='end'>{{ $tournament->end }}</td>
                                <td field-key='public'>{{ Form::checkbox("public", 1, $tournament->public == 1 ? true : false, ["disabled"]) }}</td>
                                <td field-key='tournamentmode'>{{ $tournament->tournamentmode->tournamentmode or '' }}</td>
                                <td field-key='streamlink'>{{ $tournament->streamlink }}</td>
                                <td field-key='winner'>{{ $tournament->winner->name or '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('tournament_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.tournaments.restore', $tournament->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('tournament_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.tournaments.perma_del', $tournament->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('tournament_view')
                                    <a href="{{ route('admin.tournaments.show',[$tournament->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('tournament_edit')
                                    <a href="{{ route('admin.tournaments.edit',[$tournament->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('tournament_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.tournaments.destroy', $tournament->id])) !!}
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
@stop

@section('javascript') 
    <script>
        @can('tournament_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.tournaments.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection