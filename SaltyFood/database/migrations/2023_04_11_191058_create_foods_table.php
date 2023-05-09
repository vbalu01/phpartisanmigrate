<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods', function (Blueprint $table) {
            $table->id("id")->autoIncrement();
            $table->unsignedBigInteger("r_id");
            $table->string("f_name",255);
            $table->unsignedBigInteger("c_id");
            $table->string("description",255);
            $table->integer("price");
            $table->boolean("available");
            $table->string("img_src", 255)->nullable(true);
            $table->timestamps();

            $table->foreign('r_id')->references('id')->on('restaurants')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('c_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foods');
    }
}
