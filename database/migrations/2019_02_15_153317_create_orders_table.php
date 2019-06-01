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
//            $table->integer('product_id')->unsigned();
//            $table->integer('quantity')->unsigned();
//            $table->decimal('unit_price', 10, 2)->unsigned();
//            $table->decimal('total_price', 10, 2)->unsigned();
            $table->decimal('order_total_price', 10, 2)->nullable();
            $table->date('order_date');
            $table->integer('status');//(1 Submitted  /2 Confirmed 3/shipped 4/ Delivered 5/Fullfilled 6/ Not Available)
//            $table->string('shipping');// (Delivery/Pickup)
//            $table->string('zip');

            $table->string('purchase_order_name')->nullable();
            $table->string('delivery_option')->nullable();
            $table->integer('buyer_address_id')->unsigned();

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
