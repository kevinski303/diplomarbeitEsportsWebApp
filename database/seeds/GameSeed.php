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
            
            ['id' => 1, 'beginn' => '12.05.2018 20:30:00', 'tournament_id' => 1, 'team1_id' => 1,
                'team2_id' => 2, 'pointsteam1' => 5, 'pointsteam2' => 3,],
            ['id' => 2, 'beginn' => '12.05.2018 20:30:00', 'tournament_id' => 1, 'team1_id' => 3,
                'team2_id' => 4, 'pointsteam1' => 5, 'pointsteam2' => 1,],
            ['id' => 3, 'beginn' => '12.05.2018 20:30:00', 'tournament_id' => 1, 'team1_id' => 5,
                'team2_id' => 6, 'pointsteam1' => 3, 'pointsteam2' => 5,],
            ['id' => 4, 'beginn' => '12.05.2018 20:30:00', 'tournament_id' => 1, 'team1_id' => 7,
                'team2_id' => 8, 'pointsteam1' => 1, 'pointsteam2' => 5,],
            ['id' => 5, 'beginn' => '12.05.2018 20:30:00', 'tournament_id' => 1, 'team1_id' => 9,
                'team2_id' => 10, 'pointsteam1' => 4, 'pointsteam2' => 5,],
            ['id' => 6, 'beginn' => '12.05.2018 20:30:00', 'tournament_id' => 1, 'team1_id' => 11,
                'team2_id' => 12, 'pointsteam1' => 5, 'pointsteam2' => 2,],

            ['id' => 7, 'beginn' => '15.06.2018 20:30:00', 'tournament_id' => 1, 'team1_id' => 2,
                'team2_id' => 3, 'pointsteam1' => null, 'pointsteam2' => null,],
            ['id' => 8, 'beginn' => '15.06.2018 20:30:00', 'tournament_id' => 1, 'team1_id' => 4,
                'team2_id' => 5, 'pointsteam1' => null, 'pointsteam2' => null,],
            ['id' => 9, 'beginn' => '15.06.2018 20:30:00', 'tournament_id' => 1, 'team1_id' => 6,
                'team2_id' => 7, 'pointsteam1' => null, 'pointsteam2' => null,],
            ['id' => 10, 'beginn' => '30.06.2018 20:30:00', 'tournament_id' => 1, 'team1_id' => 8,
                'team2_id' => 9, 'pointsteam1' => null, 'pointsteam2' => null,],
            ['id' => 11, 'beginn' => '30.06.2018 20:30:00', 'tournament_id' => 1, 'team1_id' => 10,
                'team2_id' => 11, 'pointsteam1' => null, 'pointsteam2' => null,],
            ['id' => 12, 'beginn' => '30.06.2018 20:30:00', 'tournament_id' => 1, 'team1_id' => 12,
                'team2_id' => 1, 'pointsteam1' => null, 'pointsteam2' => null,],

            ['id' => 13, 'beginn' => '14.07.2018 20:30:00', 'tournament_id' => 1, 'team1_id' => 3,
                'team2_id' => 8, 'pointsteam1' => null, 'pointsteam2' => null,],
            ['id' => 14, 'beginn' => '14.07.2018 20:30:00', 'tournament_id' => 1, 'team1_id' => 5,
                'team2_id' => 2, 'pointsteam1' => null, 'pointsteam2' => null,],
            ['id' => 15, 'beginn' => '14.07.2018 20:30:00', 'tournament_id' => 1, 'team1_id' => 7,
                'team2_id' => 12, 'pointsteam1' => null, 'pointsteam2' => null,],
            ['id' => 16, 'beginn' => '20.07.2018 20:30:00', 'tournament_id' => 1, 'team1_id' => 9,
                'team2_id' => 6, 'pointsteam1' => null, 'pointsteam2' => null,],
            ['id' => 17, 'beginn' => '20.07.2018 20:30:00', 'tournament_id' => 1, 'team1_id' => 11,
                'team2_id' => 4, 'pointsteam1' => null, 'pointsteam2' => null,],
            ['id' => 18, 'beginn' => '20.07.2018 20:30:00', 'tournament_id' => 1, 'team1_id' => 1,
                'team2_id' => 10, 'pointsteam1' => null, 'pointsteam2' => null,],
        ];

        foreach ($items as $item) {
            \App\Game::create($item);
        }
    }
}
