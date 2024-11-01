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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->string('apellidos');
            $table->string('nombres');
            $table->string('dni')->unique();
            $table->date('nacimiento');
            $table->string('sexo');
            $table->string('telefono');
            $table->string('email')->unique();
            $table->string('direccion');
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
