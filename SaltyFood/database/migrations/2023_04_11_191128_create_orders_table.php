<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id("id")->autoIncrement();
            $table->unsignedBigInteger("c_id");
            $table->unsignedBigInteger("a_id");
            $table->dateTime("o_date");
            $table->integer("o_status");
            $table->integer("payment_method");
            $table->integer("full_price");
            $table->timestamps();
            $table->foreign('c_id')->references('id')->on('couriers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('a_id')->references('id')->on('addresses')->onDelete('cascade')->onUpdate('cascade');

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
