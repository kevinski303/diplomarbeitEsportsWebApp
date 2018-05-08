<?php

use Illuminate\Database\Seeder;

class GameSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'beginn' => '30.04.2018 20:00:00', 'tournament_id' => 1, 'team1_id' => 1,
                'team2_id' => 3, 'pointsteam1' => 16, 'pointsteam2' => 14,],
            ['id' => 2, 'beginn' => '24.08.2018 21:15:00', 'tournament_id' => 1, 'team1_id' => 2,
                'team2_id' => 1, 'pointsteam1' => null, 'pointsteam2' => null,],
            ['id' => 3, 'beginn' => '15.06.2018 20:30:00', 'tournament_id' => 1, 'team1_id' => 3,
                'team2_id' => 2, 'pointsteam1' => null, 'pointsteam2' => null,],

        ];

        foreach ($items as $item) {
            \App\Game::create($item);
        }
    }
}
