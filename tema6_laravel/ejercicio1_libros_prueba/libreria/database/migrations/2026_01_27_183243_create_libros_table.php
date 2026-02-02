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
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('titulo');       // Título del libro
            $table->string('autor');        // Autor
            $table->integer('anio');        // Año de publicación
            $table->string('genero')->default("XXX");       // Género
            $table->text('sinopsis')->nullable(); // Sinopsis, opcional

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};
