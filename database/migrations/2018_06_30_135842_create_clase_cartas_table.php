<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClaseCartasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clase_cartas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('precio_c')->nullable();
            $table->integer('precio_v')->nullable();
            $table->double('probabilidad')->nullable();
            $table->string('nombre')->nullable();
            $table->string('imgUrl')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('clase_cartas');
    }
}
