<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaintingsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('paintings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('one_series_id');
            $table->string('name');
            $table->string('size');
            $table->string('year');
            $table->string('price');
            $table->string('img_photo_name');
            $table->longText('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('paintings');
    }

}
