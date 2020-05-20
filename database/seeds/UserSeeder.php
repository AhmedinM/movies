<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => 1,
            'name' => 'Novi',
            'email' => 'korsink@test.com',
            'email_verified_at' => '2020-05-19 18:47:49',
            'password' => '$2y$10$5MIO1JV7u0j2xRas.KIO0OZJEXnq/AqJTwmiUt9HzcEJTAdLazm8C'
        ]);
    }
}
