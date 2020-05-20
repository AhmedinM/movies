<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeriesGenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('series_genres')->insert([
            'id' => 1,
            'genre_id' => 1,
            'serie_id' =>1
        ]);
        DB::table('series_genres')->insert([
            'id' => 2,
            'genre_id' =>4,
            'serie_id' =>1
        ]);
        DB::table('series_genres')->insert([
            'id' => 3,
            'genre_id' => 3,
            'serie_id' =>2
        ]);
    }
}
