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
    {//PROYECTO HECHO POR SAMUEL DSM-43

        Schema::create('hospitales', function (Blueprint $table) {
            $table->bigIncrements('id_hospital');
            $table->string('clave')->nullable;
            $table->string('nombre');
            $table->enum('estatus', ['Activo', 'Inactivo']);
            $table->text('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hospitales');
    }
};
