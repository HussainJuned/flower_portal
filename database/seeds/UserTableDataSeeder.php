<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 20)->create()->each(function ($user) {
            //create 5 posts for each user
            factory(\App\Product::class, 5)->create(['user_id'=>$user->id]);
            factory(\App\Userinfo::class, 1)->create(['user_id'=>$user->id]);
        });
    }
}
