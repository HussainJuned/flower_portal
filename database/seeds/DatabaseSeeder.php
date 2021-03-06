<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(CategoryTableDataSeeder::class);
//         $this->call(ProductTableSeeder::class);
         $this->call(UserTableDataSeeder::class);

         $products = \App\Product::all();
        foreach ($products as $product) {
            $product->name = '#' . $product->id . ' ' . $product->name;
            $product->update();
        }
    }
}
