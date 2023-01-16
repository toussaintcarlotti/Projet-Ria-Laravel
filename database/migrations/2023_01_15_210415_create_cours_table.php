<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('cours', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('enseignant_id');
            $table->unsignedBigInteger('ue_id')->nullable()->default(null);
            $table->unsignedBigInteger('matiere_id')->nullable()->default(null);
            $table->time('horaire_debut');
            $table->time('horaire_fin');
            $table->string('type_cours');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cours');
    }
};
