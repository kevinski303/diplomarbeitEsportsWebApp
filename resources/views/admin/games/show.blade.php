@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.game.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.game.fields.beginn')</th>
                            <td field-key='beginn'>{{ $game->beginn }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.game.fields.tournament')</th>
                            <td field-key='tournament'>{{ $game->tournament->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.game.fields.team1')</th>
                            <td field-key='team1'>{{ $game->team1->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.game.fields.team2')</th>
                            <td field-key='team2'>{{ $game->team2->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.game.fields.pointsteam1')</th>
                            <td field-key='pointsteam1'>{{ $game->pointsteam1 }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.game.fields.pointsteam2')</th>
                            <td field-key='pointsteam2'>{{ $game->pointsteam2 }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.games.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
