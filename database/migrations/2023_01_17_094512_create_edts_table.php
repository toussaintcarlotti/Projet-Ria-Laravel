<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('edts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cours_id');
            $table->dateTime('date_debut');
            $table->dateTime('date_fin');
            $table->string('information')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('edts');
    }
};
