<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id("id")->autoIncrement();
            $table->unsignedBigInteger("u_id");
            $table->string("a_name",255);
            $table->integer("city_id");
            $table->string("address",255);
            $table->string("phone",255);
            $table->boolean("available");
            $table->string("other",255)->nullable();
            $table->timestamps();
            $table->foreign('u_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
