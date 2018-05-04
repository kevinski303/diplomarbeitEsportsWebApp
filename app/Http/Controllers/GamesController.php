<?php

namespace App\Http\Controllers;

use App\Game;

class GamesController extends Controller
{
    public function index()
    {
        $games = Game::whereNull('pointsteam1')->get();
        $results = Game::whereNotNull('pointsteam1')->get();
        return view('front.games', compact('games', 'results'));
    }
}
