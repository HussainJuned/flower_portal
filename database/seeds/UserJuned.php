<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserJuned extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoryTableDataSeeder::class);
        \App\User::firstOrCreate([
            'email' => 'hussainjuned99@gmail.com',
            'name' => 'Hussain Juned',
        ],[

            'email_verified_at' => now(),
            'password' => bcrypt('secret'), // secret
            'remember_token' => Str::random(10),
        ])->each(function ($user) {
            factory(\App\Userinfo::class, 1)->create(['user_id'=>$user->id]);
            factory(\App\Product::class, 5)->create(['user_id'=>$user->id]);
        });
    }
}
