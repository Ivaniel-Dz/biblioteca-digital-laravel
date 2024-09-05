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
            $table->string('titulo');
            $table->string('isbn')->unique(); // ISBN del libro
            $table->integer('año_publicacion');
            $table->foreignId('autor_id')->constrained('autores')->onDelete('cascade'); // Relación con autores
            $table->foreignId('categoria_id')->constrained('categorias')->onDelete('cascade'); // Relación con categorías
            // $table->integer('cantidad'); // Cantidad de ejemplares disponibles
            $table->timestamps();
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
