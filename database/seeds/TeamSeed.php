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
            ['id' => 4, 'name' => 'FaZe Clan', 'shortname' => 'FAZE', 'twitterlink' => 'https://twitter.com/fazeclan', 'streamlink'
            => null, 'www' => 'https://fazeclan.com/', 'logo' => 'https://pbs.twimg.com/profile_images/993701772190511104/xuDywdow_400x400.jpg',],
            ['id' => 5, 'name' => 'Astralis', 'shortname' => 'AST', 'twitterlink' => 'https://twitter.com/astralisgg', 'streamlink'
            => null, 'www' => 'http://astralis.gg/', 'logo' => 'https://pbs.twimg.com/profile_images/832222243614756864/GM50ie3U_400x400.jpg',],
            ['id' => 6, 'name' => 'Ninjas in Pyjamas', 'shortname' => 'NiP', 'twitterlink' => 'https://twitter.com/NiPGaming', 'streamlink'
            => null, 'www' => 'https://nip.gl/', 'logo' => 'https://pbs.twimg.com/profile_images/945786988006969344/lebABF-S_400x400.jpg',],
            ['id' => 7, 'name' => 'Fnatic', 'shortname' => 'FNT', 'twitterlink' => 'https://twitter.com/fnatic', 'streamlink'
            => null, 'www' => 'https://www.fnatic.com/', 'logo' => 'https://pbs.twimg.com/profile_images/875750254695653376/UIY6vhk5_400x400.jpg',],
            ['id' => 8, 'name' => 'Cloud 9', 'shortname' => 'C9', 'twitterlink' => 'https://twitter.com/cloud9', 'streamlink'
            => null, 'www' => 'http://cloud9.gg/', 'logo' => 'https://pbs.twimg.com/profile_images/877583582390124545/mCMgs_-0_400x400.jpg',],
            ['id' => 9, 'name' => 'Virtus.pro', 'shortname' => 'VIR', 'twitterlink' => 'https://twitter.com/virtuspro', 'streamlink'
            => null, 'www' => 'https://virtus.pro/en/', 'logo' => 'https://pbs.twimg.com/profile_images/979249839228760064/D-FWAg73_400x400.jpg',],
            ['id' => 10, 'name' => 'Natus Vincere', 'shortname' => 'NAV', 'twitterlink' => 'https://twitter.com/natusvincere', 'streamlink'
            => null, 'www' => 'http://navi.gg/en/', 'logo' => 'https://pbs.twimg.com/profile_images/993826728232538112/55qV2fjG_400x400.jpg',],
            ['id' => 11, 'name' => 'G2 Esports', 'shortname' => 'G2', 'twitterlink' => 'https://twitter.com/G2esports', 'streamlink'
            => null, 'www' => 'http://www.g2esports.com/', 'logo' => 'https://pbs.twimg.com/profile_images/980568587051167745/jhTPmR6P_400x400.jpg',],
            ['id' => 12, 'name' => 'Team Liquid', 'shortname' => 'LIQ', 'twitterlink' => 'https://twitter.com/TeamLiquid', 'streamlink'
            => null, 'www' => 'https://www.teamliquidpro.com/', 'logo' => 'https://pbs.twimg.com/profile_images/991733873758289920/dALVuqoB_400x400.jpg',],

        ];

        foreach ($items as $item) {
            \App\Team::create($item);
        }
    }
}
