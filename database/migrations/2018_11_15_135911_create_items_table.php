<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
   
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('name');
            $table->string('brand');
            $table->integer('categoria_id');
            $table->integer('printed')->unsigned();
            $table->integer('colored')->unsigned();
            $table->integer('form')->unsigned()->nullable();
            $table->integer('length')->unsigned()->nullable();
            $table->integer('bodyshape')->unsigned()->nullable();
            $table->integer('tipo_w')->unsigned()->nullable();
            $table->string('photo')->default('/img_default/img_item.jpg');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
