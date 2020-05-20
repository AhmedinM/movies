<?php

use Illuminate\Database\Seeder;
use App\Serie;

class SeriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Serie::create([
            'id' => 1,
            'title' => 'Serija 1',
            'picture' => 'storage/img/cover.jpg',
            'description' => 'Opis serije 1',
            'year' => 2000,
            'duration' => 45,
            'country' => 'Russia',
            'rate' => 6.7
        ]);
        Serie::create([
            'id' => 2,
            'title' => 'Serija 2',
            'picture' => 'storage/img/cover2.jpg',
            'description' => 'Opis serije 2',
            'year' => 2000,
            'duration' => 45,
            'country' => 'Russia',
            'rate' => 6.7
        ]);
        Serie::create([
            'id' => 3,
            'title' => 'Serija 3',
            'picture' => 'storage/img/cover3.jpg',
            'description' => 'Opis serije 3',
            'year' => 2000,
            'duration' => 45,
            'country' => 'Russia',
            'rate' => 6.7
        ]);
    }
}
