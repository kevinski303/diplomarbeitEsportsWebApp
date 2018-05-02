@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.playoff.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.playoff.fields.playofftournament')</th>
                            <td field-key='playofftournament'>{{ $playoff->playofftournament->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.playoff.fields.seasontournament')</th>
                            <td field-key='seasontournament'>{{ $playoff->seasontournament->name or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.playoffs.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
