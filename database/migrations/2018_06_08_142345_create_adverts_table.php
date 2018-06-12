<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment_adverts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user')->nullable();
            $table->integer('category')->nullable();
            $table->integer('subcategory')->nullable();
            $table->boolean('status')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->string('state')->nullable();
            $table->string('color')->nullable();
            $table->integer('phone')->nullable();
            $table->string('email')->nullable();
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
        Schema::dropIfExists('equipment_adverts');
    }
}
