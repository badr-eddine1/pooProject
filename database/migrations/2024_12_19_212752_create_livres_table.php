<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('livres', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('isbn')->unique();
            $table->foreignId('auteur_id')->constrained('auteurs')->onDelete('cascade');  // Corrigé ici : 'autreurs' => 'auteurs'
            $table->foreignId('categorie_id')->constrained('categories')->onDelete('cascade');
            $table->date('date_publication');
            $table->boolean('disponible');
            $table->string('editeur');
            $table->text('description')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livres');
    }
};
