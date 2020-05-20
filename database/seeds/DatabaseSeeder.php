<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(GenresTableSeeder::class);
        $this->call(MoviesTableSeeder::class);
        $this->call(SeriesTableSeeder::class);
        $this->call(SeasonsTableSeeder::class);
        $this->call(EpisodesTableSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(SeriesGenresTableSeeder::class);
        $this->call(ContentGenresTableSeeder::class);
        $this->call(MovieReviewSeeder::class);
        $this->call(MovieCaptionsSeeder::class);
    }
}
