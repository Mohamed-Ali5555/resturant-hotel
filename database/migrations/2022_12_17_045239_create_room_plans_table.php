<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_plans', function (Blueprint $table) {
            $table->id();
            $table->integer("room_id");
            $table->string("description",255);
            $table->string("x_image_plan");
            $table->string("y_image_plan");
            $table->string("w_image_plan");
            $table->string("h_image_plan");
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
        Schema::dropIfExists('room_plans');
    }
}
