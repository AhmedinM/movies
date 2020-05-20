<?php

use Illuminate\Database\Seeder;
use App\MovieCaption;

class MovieCaptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MovieCaption::create([
            'id' => 1,
            'file' => 'captions/fajl.svg',
            'title' => 'English',
            'short' => 'EN',
            'movie_id' => 1
        ]);
    }
}
