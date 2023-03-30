<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meeting_items', function (Blueprint $table) {
            $table->id();
            $table->integer("image");
            $table->integer("size")->nullable();
            $table->integer("banquet")->nullable();
            $table->integer("classroom")->nullable();
            $table->integer("reception")->nullable();

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
        Schema::dropIfExists('meeting_items');
    }
}
