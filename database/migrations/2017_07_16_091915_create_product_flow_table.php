<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductFlowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_flow', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->unsignedInteger('product_id');
            $table->integer('qty');
            $table->string('type')->default('IN');
            $table->integer('location_id')->default('0');
            $table->text('notes');
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
        Schema::dropifExists('products_flow');
    }
}
