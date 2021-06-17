<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefrigeratorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refrigerators', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('qty')->nullable();
            $table->string('value')->nullable();
            $table->enum('weight', ['кг','г','л','мл','ш'])->nullable();
            $table->string('all')->nullable();
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
        Schema::dropIfExists('refrigerators');
    }
}
