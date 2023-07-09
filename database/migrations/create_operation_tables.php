<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('operacoes', function (Blueprint $table) {
            $table->string('tipo');
            $table->unsignedBigInteger('origemID');
            $table->unsignedBigInteger('destinoID');
            $table->decimal('valor', 15, 2);
            $table->text('comentario');
            $table->string('time')->default(now('America/Sao_Paulo'));
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('operacoes');
    }
};
