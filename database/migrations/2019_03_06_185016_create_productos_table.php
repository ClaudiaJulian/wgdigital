<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('name');
            $table->string('brand');
            $table->integer('categoria_id');
            $table->integer('printed')->unsigned()->nullable();;
            $table->integer('colored')->unsigned()->nullable();;
            $table->integer('form')->unsigned()->nullable();
            $table->integer('length')->unsigned()->nullable();
            $table->integer('bodyshape')->unsigned()->nullable();
            $table->integer('tipo_w')->unsigned()->nullable();
            $table->string('photo')->default('/img_default/img_produc.jpg');
            $table->decimal('precio',7,2);
            $table->integer('descuento')->nullable();
            $table->integer('qReservas')->nullable();
            $table->string('on_off');
            $table->string('descrip')->nullable();

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
        Schema::dropIfExists('productos');
    }
}
