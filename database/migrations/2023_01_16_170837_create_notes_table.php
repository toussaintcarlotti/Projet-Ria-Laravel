<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('etudiant_id');
            $table->unsignedBigInteger('cours_id');
            $table->string('nom_examen');
            $table->unsignedBigInteger('note');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('notes');
    }
};
