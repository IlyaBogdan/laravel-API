<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up() {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->unsignedBigInteger('car_id');

            $table->foreign('car_id')->references('id')->on('cars');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('users');
    }
};
