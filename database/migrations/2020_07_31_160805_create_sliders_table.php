<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('title1', 255);
            $table->string('link1', 255);
            $table->string('img1', 255);
            $table->string('title2', 255);
            $table->string('link2', 255);
            $table->string('img2', 255);
            $table->string('title3', 255);
            $table->string('link3', 255);
            $table->string('img3', 255);
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
        Schema::dropIfExists('sliders');
    }
}
