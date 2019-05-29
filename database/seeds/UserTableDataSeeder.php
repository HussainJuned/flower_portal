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
        $this->storePC($user);

        $user = new User;
        $user->name = 'Eddy dEntrepreneur';
        $user->email = 'eddy@gmail.com';
        $user->password = bcrypt('secret01');
        $user->remember_token = Str::random(10);
        $user->save();
        factory(\App\Product::class, 5)->create(['user_id'=>$user->id]);
        factory(\App\Userinfo::class, 1)->create(['user_id'=>$user->id, 'first_name'=>'Eddy', 'last_name'=>'dEntrepreneur']);
        factory(\App\BuyerAddress::class, 1)->create(['user_id'=>$user->id]);
        $this->storePC($user);


        factory(User::class, 20)->create()->each(function ($user) {
            //create 5 products for each user
            factory(\App\Product::class, 5)->create(['user_id'=>$user->id]);
            factory(\App\Userinfo::class, 1)->create(['user_id'=>$user->id]);
            factory(\App\BuyerAddress::class, 1)->create(['user_id'=>$user->id]);

            $this->storePC($user);

        });
    }

    public function storePC($user)
    {
        $pc = new \App\PreferredCommunication();
        $pc->user_id = $user->id;
        $pc->general = 1;
        $pc->email_general = $user->email;
        $pc->order_confirmation = 1;
        $pc->email_order_confirmation = $user->email;
        $pc->shipment = 1;
        $pc->email_shipment = $user->email;
        $pc->invoices = 1;
        $pc->email_invoices = $user->email;
        $pc->save();
    }
}
