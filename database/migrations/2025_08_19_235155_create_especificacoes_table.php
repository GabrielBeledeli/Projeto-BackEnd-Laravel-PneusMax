<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('especificacoes', function (Blueprint $table) {
            $table->id('id_especificacao');
            $table->integer('largura');
            $table->string('perfil', 10);
            $table->string('indice_peso', 20)->default('NE');
            $table->string('indice_velocidade', 20)->default('NE');
            $table->string('tipo_construcao', 20);
            $table->string('tipo_terreno', 20)->default('NE');
            $table->string('desenho', 20)->default('NE');
            $table->softDeletes(); // Adiciona a coluna 'deleted_at' para o Soft Delete
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('especificacoes');
    }
};
