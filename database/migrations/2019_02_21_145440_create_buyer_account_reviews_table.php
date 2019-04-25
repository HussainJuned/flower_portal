<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuyerAccountReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyer_account_reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('buyer_user_id')->unsigned();
            $table->integer('seller_user_id')->unsigned();
            $table->integer('order_id')->unsigned();
            $table->integer('quality')->unsigned();
            $table->text('comment');
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
        Schema::dropIfExists('buyer_account_reviews');
    }
}
