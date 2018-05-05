@extends('layouts.front')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Nächste Spiele</h1>

                <table class="table">
                    @forelse($games as $game)
                        <tr>
                            <td>{{ $game->beginn }}</td>
                            <td>{{ $game->team1->name }} - {{ $game->team2->name }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2">Keine Spiele</td>
                        </tr>
                    @endforelse
                </table>

                <hr />

                <h1>Vergangene Spiele</h1>

                <table class="table">
                    @forelse($results as $game)
                        <tr>
                            <td>{{ $game->beginn }}</td>
                            <td>{{ $game->team1->name }} - {{ $game->team2->name }}</td>
                            <td>{{ $game->pointsteam1 }} : {{ $game->pointsteam2 }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">No results.</td>
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
@endsection
