<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;
//PROYECTO HECHO POR SAMUEL DSM-43
    protected $table = 'hospitales';
    protected $primaryKey = 'id_hospital';
    protected $fillable = [
        'clave',
        'nombre',
        'estatus',
        'foto'
    ];
}
