<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('buyer_user_id')->unsigned();
            $table->integer('seller_user_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->integer('quantity')->unsigned();
            $table->decimal('unit_price', 10, 2)->unsigned();
            $table->decimal('total_price', 10, 2)->unsigned();
            $table->date('order_date');
            $table->integer('status');//(1 Fullfilled/2 Outstanding/3 Confirmed/ 4 running/ 5 pending)
            $table->string('shipping');// (Delivery/Pickup)
            $table->string('zip');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
