<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreferredCommunicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preferred_communications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->boolean('general')->default(0);
            $table->string('email_general')->nullable();
            $table->boolean('order_confirmation')->default(0);
            $table->string('email_order_confirmation')->nullable();
            $table->boolean('shipment')->default(0);
            $table->string('email_shipment')->nullable();
            $table->boolean('invoices')->default(0);
            $table->string('email_invoices')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preferred_communications');
    }
}
