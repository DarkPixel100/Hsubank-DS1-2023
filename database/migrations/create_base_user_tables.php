<?php

use GuzzleHttp\Promise\Create;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cpf')->unique();
            $table->string('firstname');
            $table->string('surname');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('celular')->unique();
            $table->string('password');
            $table->datetime('criacaoUser')->default(now('America/Sao_Paulo'));
        });

        Schema::create('contas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('userID');
            $table->decimal('saldo', 15, 2);
            $table->decimal('limite');
            $table->datetime('criacaoConta')->default(now('America/Sao_Paulo'));

            $table->foreign('userID')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('chavespix', function (Blueprint $table) {
            $table->unsignedBigInteger('contaID');
            $table->string('chavePix');
            $table->foreign('contaID')->references('id')->on('contas');
        });

        Schema::create('logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('userID');
            $table->string('loginTime')->default(now('America/Sao_Paulo'));
            $table->string('logoutTime')->nullable();
            $table->foreign('userID')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logs');
        Schema::dropIfExists('chavespix');
        Schema::dropIfExists('contas');
        Schema::dropIfExists('users');
    }
};
