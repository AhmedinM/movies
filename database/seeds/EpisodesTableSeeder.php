<?php

use Illuminate\Database\Seeder;
use App\Episode;

class EpisodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Episode::create([
            'id' => 1,
            'title' => 'Prva epizoda',
            'number' => 1,
            'published' => '2020-02-12',
            'season_id' => 1,
            'video' => 'nema',
            'views' => 0
        ]);
        Episode::create([
            'id' => 2,
            'title' => 'Druga epizoda',
            'number' => 2,
            'published' => '2020-02-14',
            'season_id' => 2,
            'video' => 'nema',
            'views' => 0
        ]);
        Episode::create([
            'id' => 3,
            'title' => 'Epizoda druga',
            'number' => 2,
            'published' => '2020-03-12',
            'season_id' => 3,
            'video' => 'nema',
            'views' => 0
        ]);
        Episode::create([
            'id' => 4,
            'title' => 'Epizoda prva',
            'number' => 1,
            'published' => '2020-03-12',
            'season_id' => 1,
            'video' => 'nema',
            'views' => 0
        ]);
        Episode::create([
            'id' => 5,
            'title' => 'Epizoda treca',
            'number' => 3,
            'published' => '2020-03-12',
            'season_id' => 2,
            'video' => 'nema',
            'views' => 0
        ]);
        Episode::create([
            'id' => 6,
            'title' => 'Treca epizoda',
            'number' => 3,
            'published' => '2020-03-12',
            'season_id' => 3,
            'video' => 'nema',
            'views' => 0
        ]);
    }
}
