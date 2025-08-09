<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pneu', function (Blueprint $table) {
            $table->id('id_pneu');
            $table->string('marca', 50);
            $table->string('modelo', 100);
            $table->integer('aro');
            $table->string('medida', 20);
            $table->decimal('preco', 10, 2);
            $table->integer('quantidade_estoque');

            // FK para especificacao - relação 1:1
            $table->unsignedBigInteger('id_especificacao')->unique();
            $table->foreign('id_especificacao')
                  ->references('id_especificacao')
                  ->on('especificacao')
                  ->restrictOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pneu');
    }
};
