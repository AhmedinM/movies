<?php

use Illuminate\Database\Seeder;
use App\ContentGenre;

class ContentGenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContentGenre::create([
            'id' => 1,
            'genre_id' => 1,
            'movie_id' =>1
        ]);
        ContentGenre::create([
            'id' => 2,
            'genre_id' => 2,
            'movie_id' =>1
        ]);
        ContentGenre::create([
            'id' => 3,
            'genre_id' => 3,
            'movie_id' =>2
        ]);
    }
}
