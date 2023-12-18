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
            $table->text('name');
            $table->text('description');
            $table->text('price');
            $table->text('total_room');
            $table->text('amenities')->nullable();
            $table->text('size')->nullable();
            $table->text('total_bad')->nullable();
            $table->text('total_bathroom')->nullable();
            $table->text('total_balconics')->nullable();
            $table->text('total_guest')->nullable();
            $table->text('featured_photo');
            $table->text('video_id')->nullable();
            $table->text('status');
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
