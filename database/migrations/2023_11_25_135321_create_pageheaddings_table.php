<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageheaddingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pageheaddings', function (Blueprint $table) {
            $table->id();
            $table->string('photoheading')->nullable();
            $table->string('photostatus')->nullable();
            $table->string('videoheading')->nullable();
            $table->string('videostatus')->nullable();
            $table->string('faqheading')->nullable();
            $table->string('faqstatus')->nullable();
            $table->string('blogheading')->nullable();
            $table->string('blogstatus')->nullable();
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
        Schema::dropIfExists('pageheaddings');
    }
}
