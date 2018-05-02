<?php

use Illuminate\Database\Seeder;

class ModeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'tournamentmode' => 'Round Robin',],
            ['id' => 2, 'tournamentmode' => 'Knockout',],
            ['id' => 3, 'tournamentmode' => 'Friendly',],

        ];

        foreach ($items as $item) {
            \App\Mode::create($item);
        }
    }
}
