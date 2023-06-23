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
        Schema::dropIfExists('users');
        Schema::dropIfExists('contas');
        Schema::dropIfExists('logs');
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('cpf');
            $table->string('fullname');
            $table->string('username');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamp('criacaoUser')->default(\DB::raw('CURRENT_TIMESTAMP'));
        });

        Schema::create('contas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('agencia');
            $table->integer('userID');
            $table->decimal('saldo', 10, 2);
            $table->decimal('limite');
            $table->string('chavePIX')->nullable();
            $table->timestamp('criacaoConta')->default(\DB::raw('CURRENT_TIMESTAMP'));
        });

        Schema::create('logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('userID');
            $table->string('acao');
            $table->timestamp('horario')->default(\DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('contas');
        Schema::dropIfExists('logs');
    }
};
