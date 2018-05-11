@extends('layouts.front')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="text-center">Teams</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="team-section">
                @forelse($teams as $team)
                <div class="col-md-3 text-center" style="margin-top: 15px">
                    <a href="{{$team->twitterlink}}">
                        <img src="{{$team->logo}}" class="img-circle" width="120px">
                        <div class="caption">
                            <p class="text-bold text-muted">{{$team->name}}</p>
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
