<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void {
        Schema::create('commentaires', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->text('commentaire');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('edited_at')->useCurrent();
            $table->foreignId('film_id')->constrained('films')->cascadeOnDelete();
        });
    }

    public function down(): void {
        Schema::dropIfExists('commentaires');
    }
};
