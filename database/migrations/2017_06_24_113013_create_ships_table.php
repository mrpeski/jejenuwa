<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ships', function (Blueprint $table) {
            $table->integer('id');
            $table->string('name');
            $table->integer('type');
            $table->integer('imo');
            $table->string('call_sign');
            $table->string('flag');
            $table->float('length');
            $table->float('width');
            $table->integer('draught');
            $table->integer('grt');
            $table->integer('dwt');
            $table->integer('year_built');
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
        Schema::dropIfExists('ships');
    }
}
