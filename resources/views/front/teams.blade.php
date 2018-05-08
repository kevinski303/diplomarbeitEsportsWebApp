@extends('layouts.front')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Teams</h1>
                <div class="team-section">
                @forelse($teams as $team)
                <div style="width: 15em; text-align: center">
                    <a href="{{$team->www}}">
                        <img src="{{$team->logo}}" class="img-circle" width="150px">
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
        </div>
    </div>
@endsection
