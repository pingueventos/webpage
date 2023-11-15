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
        Schema::create('calendars', function (Blueprint $table) {
            $table->id();
            $table->date('dia');
            $table->string('diadasemana');
            $table->string('h00')->default('Indisp.');
            $table->string('h01')->default('Indisp.');
            $table->string('h02')->default('Indisp.');
            $table->string('h03')->default('Indisp.');
            $table->string('h04')->default('Indisp.');
            $table->string('h05')->default('Indisp.');
            $table->string('h06')->default('Indisp.');
            $table->string('h07')->default('Indisp.');
            $table->string('h08')->default('Indisp.');
            $table->string('h09')->default('Indisp.');
            $table->string('h10')->default('Indisp.');
            $table->string('h11')->default('Indisp.');
            $table->string('h12')->default('Indisp.');
            $table->string('h13')->default('Indisp.');
            $table->string('h14')->default('Indisp.');
            $table->string('h15')->default('Indisp.');
            $table->string('h16')->default('Indisp.');
            $table->string('h17')->default('Indisp.');
            $table->string('h18')->default('Indisp.');
            $table->string('h19')->default('Indisp.');
            $table->string('h20')->default('Indisp.');
            $table->string('h21')->default('Indisp.');
            $table->string('h22')->default('Indisp.');
            $table->string('h23')->default('Indisp.');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calendars');
    }
};
