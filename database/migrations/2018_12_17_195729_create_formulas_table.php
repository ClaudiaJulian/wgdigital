<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormulasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formulas', function (Blueprint $table) {
            $table->increments('id');

            $table->string('cuerpo');
            $table->string('categoria_1');
            $table->integer('form_1');
            $table->integer('printed_1');
            $table->integer('colored_1');
            $table->integer('length_1');

            $table->string('categoria_2');
            $table->integer('form_2');
            $table->integer('printed_2');
            $table->integer('colored_2');
            $table->integer('length_2');

            $table->string('categoria_3');
            $table->integer('form_3');
            $table->integer('printed_3');
            $table->integer('colored_3');
            $table->integer('length_3');


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
        Schema::dropIfExists('formulas');
    }
}
