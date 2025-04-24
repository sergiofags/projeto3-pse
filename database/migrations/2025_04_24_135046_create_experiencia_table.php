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
        Schema::create('experiencia', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_pessoa')->constrained('pessoas');

            $table->enum('tipo_experiencia', ['Acadêmica', 'Profissional']);
            $table->enum('status', ['Trancado', 'Cursando', 'Formado', 'EmpregoAnterior', 'EmpregoAtual']);
            $table->string('empresa_instituicao')->nullable();
            $table->string('curso_cargo')->nullable();
            $table->string('nivel')->nullable();
            $table->string('atividades')->nullable();
            $table->string('semestre_modulo')->nullable();
            $table->date('data_inicio')->nullable();
            $table->date('data_fim')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiencia');
    }
};