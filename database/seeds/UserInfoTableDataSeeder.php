<?php

use Illuminate\Database\Seeder;

class UserInfoTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Product::class, 10)->create();
    }
}