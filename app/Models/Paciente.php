<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;
//PROYECTO HECHO POR SAMUEL DSM-43

    protected $table = 'pacientes';
    protected $primaryKey = 'id_paciente';
    protected $fillable = [
        'nombre',
        'apellidop',
        'fecha_nacimiento',
        'sexo',
        'foto',
        'estatus',
    ];
}
