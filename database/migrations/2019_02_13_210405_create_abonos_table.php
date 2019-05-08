<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbonosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abonos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('estrellas');
            $table->integer('guardarropa');
            $table->integer('capacidad');
            $table->integer('outfit');
            $table->integer('consultas');
            $table->integer('p_mes');
            $table->integer('p_sem');
            $table->integer('p_anual');
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
        Schema::dropIfExists('abonos');
    }
}
