<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hints', function (Blueprint $table) {
            $table->id();
            $table->text('septic_type')->nullable();
            $table->text('performance')->nullable();
            $table->text('persons')->nullable();
            $table->text('reset_type')->nullable();
            $table->text('inset_depth')->nullable();
            $table->text('modification')->nullable();
            $table->text('type_of_drainage')->nullable();
            $table->text('performance_prod')->nullable();
            $table->text('salvo_discharge')->nullable();
            $table->text('inset_depth_prod')->nullable();
            $table->text('dimensions')->nullable();
            $table->text('electricity_consumption')->nullable();
            $table->text('weight')->nullable();
            $table->text('mounting')->nullable();
            $table->text('reset_type_prod')->nullable();
            $table->text('entrance_size')->nullable();
            $table->text('useful_volume')->nullable();
            $table->text('equipment')->nullable();
            $table->text('elongate')->nullable();
            $table->text('anchor')->nullable();
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
        Schema::dropIfExists('hints');
    }
}
