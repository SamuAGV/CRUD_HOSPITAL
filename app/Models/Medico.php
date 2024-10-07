<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;
//PROYECTO HECHO POR SAMUEL DSM-43

    protected $table = 'medicos';
    protected $primaryKey = 'id_medico';
    protected $fillable = [
        'clave',
        'nombre',
        'apellidop',
        'fecha_nacimiento',
        'sexo',
        'email',
        'estatus',
        'foto',
    ];
}
