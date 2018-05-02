<?php

use Illuminate\Database\Seeder;

class TeamSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'SPG eSports', 'shortname' => 'SPG', 'twitterlink' => 'https://twitter.com/SPGeSports', 'streamlink' => null, 'www' => 'https://www.spgesports.com/', 'logo' => '/tmp/phpD0RClO',],
            ['id' => 2, 'name' => 'mYinsanity', 'shortname' => 'MYI', 'twitterlink' => null, 'streamlink' => null, 'www' => null, 'logo' => null,],
            ['id' => 3, 'name' => 'Silent Gaming', 'shortname' => 'SiG', 'twitterlink' => null, 'streamlink' => null, 'www' => null, 'logo' => null,],

        ];

        foreach ($items as $item) {
            \App\Team::create($item);
        }
    }
}
