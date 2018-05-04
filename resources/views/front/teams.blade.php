@extends('layouts.front')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Teams</h1>

                <table class="table">
                    @forelse($teams as $team)
                        <tr>
                            <td>{{ $team->name }}</td>
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
