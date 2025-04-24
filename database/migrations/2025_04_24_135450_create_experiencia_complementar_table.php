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
        Schema::create('experiencia_complementar', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_pessoa')->constrained('pessoas');

            $table->enum('tipo_experiencia', ['Idioma', 'Curso']);
            $table->string('titulo');
            $table->string('descricao');
            $table->enum('nivel_idioma', ['Básico', 'Intermediário', 'Avancado', 'Fluente/Nativo']);
            $table->string('certificado');
            $table->date('data_inicio');
            $table->date('data_fim');
            $table->string('instituicao');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiencia_complementar');
    }
};