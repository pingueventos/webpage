<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('solicitacoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('nome')->nullable();
            $table->date('data');
            $table->integer('inicio');
            $table->integer('fim');
            $table->integer('numconvidados');
            $table->integer('confirmados')->default(0);
            $table->integer('presentes')->default(0);
            $table->integer('idade');
            $table->integer('id_pacote')->nullable();
            $table->string('pacotecomida')->nullable();
            $table->string('comida_pacote')->nullable();
            $table->string('bebida_pacote')->nullable();
            $table->string('imagem1_pacote')->nullable();
            $table->string('imagem2_pacote')->nullable();
            $table->string('imagem3_pacote')->nullable();
            $table->string('preco_pacote')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitacoes');
    }
};
