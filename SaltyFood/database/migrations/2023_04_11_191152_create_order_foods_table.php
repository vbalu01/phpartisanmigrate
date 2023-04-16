<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_foods', function (Blueprint $table) {

            $table->unsignedBigInteger("f_id");
            $table->unsignedBigInteger("o_id");
            $table->integer("count");
            $table->unique(['f_id', 'o_id'])->primary();
            $table->timestamps();
            $table->foreign('f_id')->references('id')->on('foods')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('o_id')->references('id')->on('orders')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_foods');
    }
}
