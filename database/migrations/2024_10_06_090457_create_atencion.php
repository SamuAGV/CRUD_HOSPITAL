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

        Schema::create('atencion', function (Blueprint $table) {
            $table->bigIncrements('id_atencion');            
            $table->foreignId('id_hospital');          
            $table->foreignId('id_medico');
            $table->foreignId('id_paciente');
            $table->text('detalles');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atencion');
    }
};
