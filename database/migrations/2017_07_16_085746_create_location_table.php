<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ship_id');
            $table->float('lat', 9, 6);
            $table->float('lon', 9, 6);
            $table->integer('speed');
            $table->integer('heading');
            $table->integer('course');
            $table->integer('status');
            $table->timestamp('marine_time');
            $table->string('dscr');
            $table->string('current_port')->nullable();
            $table->string('last_port')->nullable();
            $table->date('last_port_time')->nullable();
            $table->string('destination')->nullable();
            $table->integer('port_id')->nullable();
            $table->string('port_unlocode')->nullable();
            $table->integer('last_port_id')->nullable();
            $table->string('last_port_unlocode')->nullable();
            $table->date('eta')->nullable();
            $table->date('eta_calc')->nullable();
            $table->integer('next_port_id')->nullable();
            $table->string('next_port_country')->nullable();
            // $table->primary('ship_id');
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
        Schema::dropIfExists('locations');
    }
}
