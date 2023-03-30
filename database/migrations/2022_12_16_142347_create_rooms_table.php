<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->integer("size");
            $table->integer("image")->default(0);
            $table->string("lat")->nullable();
            $table->string("lang")->nullable();
            $table->integer("plan")->default(0);
            $table->integer("count")->default(0);
            $table->integer("use")->default(0);
            $table->double("price")->default(0);
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
        Schema::dropIfExists('rooms');
    }
}
