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
            
            ['id' => 1, 'name' => 'SPG eSports', 'shortname' => 'SPG', 'twitterlink' => 'https://twitter.com/SPGeSports', 'streamlink'
            => null, 'www' => 'https://www.spgesports.com/', 'logo' => 'https://www.spgesports.com/file/2017/01/spg-logo-blue-border-800x811.png',],
            ['id' => 2, 'name' => 'mYinsanity', 'shortname' => 'MYI', 'twitterlink' => 'https://twitter.com/mYinsanityCH', 'streamlink'
            => null, 'www' => 'http://myinsanity.eu/', 'logo' => 'https://pbs.twimg.com/profile_images/985118139464732673/9aKHm3ID_400x400.jpg',],
            ['id' => 3, 'name' => 'Silent Gaming', 'shortname' => 'SiG', 'twitterlink' => 'https://twitter.com/silentgaming_ch', 'streamlink'
            => null, 'www' => 'https://silentgaming.ch/', 'logo' => 'https://pbs.twimg.com/profile_images/830136945305071616/oao8DtOO_400x400.jpg',],

        ];

        foreach ($items as $item) {
            \App\Team::create($item);
        }
    }
}
