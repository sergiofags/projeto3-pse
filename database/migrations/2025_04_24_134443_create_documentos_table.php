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
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_pessoa')->constrained('pessoas');

            $table->enum('tipo_documento', ['Candidatura', 'Contratacao']);
            $table->string('file')->nullable();
            
            $table->enum('nome_documento', ['AtestadoMatricula', 'HistoricoEscolar', 'Curriculo', 'CoeficienteRendimento', 'Foto3x4', 'CedulaIdentidadeOuCNH', 'CadastroPessoaFisica', 'CTPS', 'CarteiraDeReservista', 'ComprovanteDeResidencia', 'AntecedentesCriminaisECivel', 'AntecedentesCriminaisPoliciaFederal', 'VacinacaFebreAmarela', 'VacinacaCovid19', 'GrupoSanguineo', 'ComprovanteMatricula', 'AtestadadoFrequencia']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentos');
    }
};