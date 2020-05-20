<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Movie;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('movies')->insert([
        Movie::create([
            'id' => 1,
            'title' => 'Proba',
            'picture' => 'storage/img/cover.jpg',
            'description' => 'opis',
            'year' => 2020,
            'country' => 'USA',
            'duration' => 120,
            'rate' => 8.4,
            'video' => 'nema',
            'views' => 0
        ]);
        Movie::create([
            'id' => 2,
            'title' => 'Proba1',
            'picture' => 'storage/img/cover2.jpg',
            'description' => 'opis1',
            'year' => 2020,
            'country' => 'USA',
            'duration' => 120,
            'rate' => 8.4,
            'video' => 'nema',
            'views' => 0
        ]);
        Movie::create([
            'id' => 3,
            'title' => 'Proba2',
            'picture' => 'storage/img/cover3.jpg',
            'description' => 'opis2',
            'year' => 2020,
            'country' => 'USA',
            'duration' => 120,
            'rate' => 8.4,
            'video' => 'nema',
            'views' => 0
        ]);
        Movie::create([
            'id' => 4,
            'title' => 'Proba3',
            'picture' => 'storage/img/cover4.jpg',
            'description' => 'opis3',
            'year' => 2020,
            'country' => 'USA',
            'duration' => 120,
            'rate' => 8.4,
            'video' => 'nema',
            'views' => 0
        ]);
        Movie::create([
            'id' => 5,
            'title' => 'Proba4',
            'picture' => 'storage/img/cover5.jpg',
            'description' => 'opis4',
            'year' => 2020,
            'country' => 'USA',
            'duration' => 120,
            'rate' => 8.4,
            'video' => 'nema',
            'views' => 0
        ]);
        Movie::create([
            'id' => 6,
            'title' => 'Proba 6',
            'picture' => 'storage/img/cover6.jpg',
            'description' => 'opis',
            'year' => 2020,
            'country' => 'GBR',
            'duration' => 180,
            'rate' => 6.6,
            'video' => 'nema',
            'views' => 0
        ]);
    }
}
