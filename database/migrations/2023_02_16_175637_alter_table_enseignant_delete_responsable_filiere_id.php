<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('enseignants', function (Blueprint $table) {
            $table->dropColumn('responsable_filiere_id');
        });
    }

    public function down()
    {
        Schema::table('enseignants', function (Blueprint $table) {
            $table->unsignedBigInteger('responsable_filiere_id')->nullable()->default(null);
        });
    }
};
