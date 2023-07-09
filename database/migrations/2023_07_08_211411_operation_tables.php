<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chavespix', function (Blueprint $table) {
            $table->unsignedBigInteger('contaID');
            $table->string('chavePix');
            $table->foreign('contaID')->references('id')->on('contas');
        });

        Schema::create('operacoes', function (Blueprint $table) {
            $table -> unsignedBigInteger('origemID');
            $table -> unsignedBigInteger('destinoID');
            $table -> decimal('quantia', 15, 2);
            $table -> string('comentarios');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chavespix');
    }
};
