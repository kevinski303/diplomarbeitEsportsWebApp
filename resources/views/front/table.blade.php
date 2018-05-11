@extends('layouts.front')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Tabelle</h1>
                <table class="table">
                    <tr>
                        <td><strong>#</strong></td>
                        <th>Team</th>
                        <th>S</th>
                        <th>U</th>
                        <th>N</th>
                        <th class="text-center">Punkte</th>
                    </tr>
                    @forelse ($teams as $team)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td><a href="{{$team->twitterlink}}" class="text-muted">{{$team->name}}</a></td>
                        <td>{{$team->won}}</td>
                        <td>{{$team->tied}}</td>
                        <td>{{$team->lost}}</td>
                        <td class="text-center">{{$team->points}}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="2">Keine Teams</td>
                    </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
@endsection
