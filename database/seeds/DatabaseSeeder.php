<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(TeamSeed::class);
        $this->call(ModeSeed::class);
        $this->call(TournamentSeed::class);
        $this->call(GameSeed::class);
        $this->call(RoleSeed::class);
        $this->call(UserSeed::class);

    }
}
