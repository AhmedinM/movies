<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        Admin::create([
            'id' => 1,
            'email' => 'admin@test.com',            
            'password' => '$2y$10$5MIO1JV7u0j2xRas.KIO0OZJEXnq/AqJTwmiUt9HzcEJTAdLazm8C'
        ]);
    }
}
