<?php

use Illuminate\Database\Seeder;
use App\Genre;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genre::create([
            'id' => 1,
            'name' => 'Akcija'
        ]);
        Genre::create([
            'id' => 2,
            'name' => 'Komedija'
        ]);
        Genre::create([
            'id' => 3,
            'name' => 'Fantazija'
        ]);
        Genre::create([
            'id' => 4,
            'name' => 'Romantika'
        ]);
    }
}
