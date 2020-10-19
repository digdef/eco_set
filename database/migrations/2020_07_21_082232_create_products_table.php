<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('img', 255)->nullable();
            $table->string('wiring_diagram', 255)->nullable();
            $table->string('technical_certificate', 255)->nullable();
            $table->string('title', 255)->nullable();
            $table->string('header_note', 255)->nullable();
            $table->string('pinterest', 255)->nullable();
            $table->string('price', 255)->nullable();
            $table->text('thumbnail')->nullable();
            $table->text('description')->nullable();
            $table->string('insert_depth', 255)->nullable();
            $table->string('reset_type', 255)->nullable();
            $table->string('modification', 255)->nullable();
            $table->string('type_of_drainage', 255)->nullable();
            $table->string('performance', 255)->nullable();
            $table->string('salvo_discharge', 255)->nullable();
            $table->string('electricity_consumption', 255)->nullable();
            $table->string('weight', 255)->nullable();
            $table->string('mounting', 255)->nullable();
            $table->string('dimensions', 255)->nullable();
            $table->string('persons', 255)->nullable();
            $table->string('type_of_shell', 255)->nullable();
            $table->string('type_septic', 255)->nullable();
            $table->string('manufacturer', 255)->nullable();
            $table->string('elongate', 255)->nullable();
            $table->string('anchor', 255)->nullable();
            $table->string('equipment', 255)->nullable();
            $table->string('entrance_size', 255)->nullable();
            $table->string('useful_volume', 255)->nullable();
            $table->string('url', 255)->nullable();
            $table->string('meta_title', 255)->nullable();
            $table->string('meta_description', 255)->nullable();
            $table->integer('sink')->nullable();
            $table->integer('bath')->nullable();
            $table->integer('toilet')->nullable();
            $table->integer('washer')->nullable();
            $table->integer('shower')->nullable();
            $table->integer('action')->nullable();
            $table->integer('new')->nullable();
            $table->integer('top')->nullable();
            $table->integer('advise')->nullable();
            $table->integer('category')->nullable();
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
        Schema::dropIfExists('products');
    }
}
