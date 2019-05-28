<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'Hussain Juned';
        $user->email = 'hussainjuned99@gmail.com';
        $user->password = bcrypt('secret01');
        $user->remember_token = Str::random(10);
        $user->save();
        factory(\App\Product::class, 5)->create(['user_id'=>$user->id]);
        factory(\App\Userinfo::class, 1)->create(['user_id'=>$user->id, 'first_name'=>'Hussain', 'last_name'=>'Juned']);
        factory(\App\BuyerAddress::class, 1)->create(['user_id'=>$user->id]);


        $user = new User;
        $user->name = 'Eddy dEntrepreneur';
        $user->email = 'eddy@gmail.com';
        $user->password = bcrypt('secret01');
        $user->remember_token = Str::random(10);
        $user->save();
        factory(\App\Product::class, 5)->create(['user_id'=>$user->id]);
        factory(\App\Userinfo::class, 1)->create(['user_id'=>$user->id, 'first_name'=>'Eddy', 'last_name'=>'dEntrepreneur']);
        factory(\App\BuyerAddress::class, 1)->create(['user_id'=>$user->id]);





        factory(User::class, 20)->create()->each(function ($user) {
            //create 5 products for each user
            factory(\App\Product::class, 5)->create(['user_id'=>$user->id]);
            factory(\App\Userinfo::class, 1)->create(['user_id'=>$user->id]);
            factory(\App\BuyerAddress::class, 1)->create(['user_id'=>$user->id]);
        });
    }
}
