<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movie_reviews')->insert([
            'id' => 1,
            'title' => 'naslov',
            'description' => 'opis recenzije',
            'movie_id' => 1,
            'user_id' => 1
        ]);
    }
}
