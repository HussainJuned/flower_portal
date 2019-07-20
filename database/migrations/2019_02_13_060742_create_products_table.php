<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(/**
         * @param Blueprint $table
         */
            'products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('name');
            $table->text('description');
            $table->decimal('price_per_stem_bunch', 8, 2);
            $table->integer('number_of_stem');
            $table->decimal('price', 10, 2);
            $table->string('pack');
            $table->string('height');
            $table->string('weight')->nullable();
            $table->string('origin');
            $table->string('colour');
            $table->string('category');
            $table->date('available_date_start');
            $table->date('available_date_end');
            $table->boolean('status')->default(0);
            $table->string('photo_url');
            $table->integer('stock')->unsigned();
            $table->integer('s_increment')->default(1);
            $table->integer('feature')->default(0);
            // 0 = normal, 1 = special, 2 = low price, 3 = exclusive, 4 = Limited
            $table->string('grower')->nullable();
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
        Schema::dropIfExists('products');
    }
}
