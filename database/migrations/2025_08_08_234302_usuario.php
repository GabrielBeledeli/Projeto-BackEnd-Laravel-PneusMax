<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->string('nome', 200);
            $table->string('senha', 25);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('usuario');
    }
};
