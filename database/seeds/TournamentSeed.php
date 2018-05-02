<?php

use Illuminate\Database\Seeder;

class TournamentSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'Friendly Games 2018', 'beginn' => '01.01.2018', 'end' => '31.12.2018', 'public' => 1, 'tournamentmode_id' => 3, 'streamlink' => null, 'winner_id' => null,],

        ];

        foreach ($items as $item) {
            \App\Tournament::create($item);
        }
    }
}
