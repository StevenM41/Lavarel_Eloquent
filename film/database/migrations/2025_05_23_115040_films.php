<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void {
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->unique();
            $table->text('description');
            $table->string('image')->nullable();
            $table->string('nom_auteur');
            $table->date('mise_en_ligne');
            $table->integer('durer'); // en secondes
            $table->integer('note')->default(0);
        });
    }

    public function down(): void {
        Schema::dropIfExists('films');
    }
};
