<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userinfos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('company_name')->nullable();
            $table->string('title');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('country');
            $table->string('state')->nullable();
            $table->string('city');
            $table->string('delivery_address_1');
            $table->string('delivery_address_2')->nullable();
            $table->string('zip');
            $table->string('telephone');
            $table->string('business_type');
            $table->string('hear_about_us');
            $table->string('comments')->nullable();
            $table->string('language');
            $table->string('website')->nullable();
            $table->string('fax')->nullable();
            $table->boolean('isSeller')->default(false);
            $table->boolean('isBuyer')->default(false);
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userinfos');
    }
}
