<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clases', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('precio_c')->nullable();
            $table->integer('precio_v')->nullable();
            $table->float('probabilidad')->nullable();
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
        Schema::drop('clases');
    }
}
