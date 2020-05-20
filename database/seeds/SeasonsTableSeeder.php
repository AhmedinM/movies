<?php

use Illuminate\Database\Seeder;
use App\Season;

class SeasonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Season::create([
            'id' => 1,
            'number' => 1,
            'serie_id' => 1,
        ]);
        Season::create([
            'id' => 2,
            'number' => 2,
            'serie_id' => 1,
        ]);
        Season::create([
            'id' => 3,
            'number' => 1,
            'serie_id' => 2,
        ]);
    }
}
