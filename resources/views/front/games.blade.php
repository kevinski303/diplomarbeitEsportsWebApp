@extends('layouts.front')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Nächste Spiele</h1>

                <table class="table">
                    <tr>
                        <td><strong>Begegnung</strong></td>
                        <td><strong>Datum & Anspielzeit</strong></td>
                    </tr>
                    @forelse($games as $game)
                        <tr>
                            <td>{{ $game->team1->name }} - {{ $game->team2->name }}</td>
                            <td>{{ $game->beginn }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2">Keine zukünftigen Spiele</td>
                        </tr>
                    @endforelse
                </table>

                <hr />

                <h1>Vergangene Spiele</h1>

                <table class="table">
                    <tr>
                        <td><strong>Begegnung</strong></td>
                        <td><strong>Endresultat</strong></td>
                    </tr>
                    <tr>
                    @forelse($results as $game)
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
