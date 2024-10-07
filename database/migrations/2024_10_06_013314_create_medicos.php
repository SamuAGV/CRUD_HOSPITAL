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

        Schema::create('medicos', function (Blueprint $table) {
            $table->bigIncrements('id_medico');
            $table->string('clave')->unique();
            $table->string('nombre');
            $table->string('apellidop');
            $table->date('fecha_nacimiento');
            $table->enum('sexo', ['Masculino', 'Femenino']);
            $table->string('email')->unique();
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
        Schema::dropIfExists('medicos');
    }
};
