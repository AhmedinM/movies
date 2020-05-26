<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cards')->insert([
            'id' => 1,
            'number' => '1234567890123456',
            'pin' => 1234,
            'status' => 0.0
        ]);
        DB::table('cards')->insert([
            'id' => 2,
            'number' => '0987654321098765',
            'pin' => 4321,
            'status' => 12.67
        ]);
        DB::table('cards')->insert([
            'id' => 3,
            'number' => '5169719278781027',
            'pin' => 4653,
            'status' => 4.56
        ]);
        DB::table('cards')->insert([
            'id' => 4,
            'number' => '4579437595969398',
            'pin' => 8933,
            'status' => 214234.46
        ]);
        DB::table('cards')->insert([
            'id' => 5,
            'number' => '0020304493059202',
            'pin' => 5776,
            'status' => 5776.00
        ]);
    }
}
