<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutfitsTable extends Migration
{
    public function up()
    {
        Schema::create('outfits', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('t_id')->unsigned();
            $table->integer('b_id')->unsigned();
            $table->integer('o_id')->unsigned();
            $table->integer('s_id')->unsigned();
            $table->integer('ba_id')->unsigned();
            $table->integer('work')->unsigned()->default('0');
            $table->integer('day')->unsigned()->default('0');
            $table->integer('night')->unsigned()->default('0');
            $table->string('nota')->nullable();
            $table->string('share')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('outfits');
    }
}
