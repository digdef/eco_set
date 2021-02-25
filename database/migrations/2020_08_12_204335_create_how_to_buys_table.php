<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHowToBuysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('how_to_buys', function (Blueprint $table) {
            $table->id();
            $table->string('text-icon1', 255)->nullable();
            $table->string('text-icon2', 255)->nullable();
            $table->string('text-icon3', 255)->nullable();
            $table->string('text-icon4', 255)->nullable();
            $table->text('text')->nullable();
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
        Schema::dropIfExists('how_to_buys');
    }
}
