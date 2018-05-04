@extends('layouts.front')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Tabelle</h1>

                <table class="table">
                        <tr>
                            <td>Position</td>
                            <th>Team</th>
                            <th>W</th>
                            <th>T</th>
                            <th>L</th>
                            <th>Punkte</th>
                        </tr>
                        @forelse($teams as $team)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$team->name}}</td>
                                <td>{{$team->won}}</td>
                                <td>{{$team->lost}}</td>
                                <td>{{$team->tied}}</td>
                                <td>{{$team->points}}</td>
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