<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('log_acao', function (Blueprint $table) {
            $table->id('id_log'); // BIGINT UNSIGNED

            // FK para pneu - relação 1:N
            $table->unsignedBigInteger('id_pneu');
            $table->foreign('id_pneu')
                  ->references('id_pneu')
                  ->on('pneu')
                  ->restrictOnDelete();

            // FK para usuario - relação 1:N
            $table->unsignedBigInteger('id_usuario');
            $table->foreign('id_usuario')
                  ->references('id_usuario')
                  ->on('usuario')
                  ->restrictOnDelete();

            $table->string('acao', 20);
            $table->dateTime('data_hora')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('log_acao');
    }
};
