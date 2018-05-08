@extends('layouts.front')

@section('content')
    <div class="container" style="margin: 0 auto">
        <div class="team-section">
            @forelse($teams as $team)
                <div style="width: 20em; text-align: center">
                        <a href="{{$team->www}}">
                            <img src="{{$team->logo}}" class="img-circle" width="100px">
                            <div class="caption">
                                <p>{{$team->name}}</p>
                            </div>
                        </a>
                </div>
            @empty
                <h1>Keine Teams vorhanden</h1>
            @endforelse
        </div>
    </div>
@endsection
