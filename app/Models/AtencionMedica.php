<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AtencionMedica extends Model
{
    use HasFactory;
    protected $table = 'atencion';
    protected $primaryKey = 'id_atencion';
    protected $fillable = [
        'id_hospital',
        'id_medico',
        'id_paciente',
        'detalles'
    ];
//PROYECTO HECHO POR SAMUEL DSM-43
    public function AgHospital() { return $this->belongsTo(Hospital::class, 'id_hospital');}
    public function AgMedico() { return $this->belongsTo(Medico::class, 'id_medico');}
    public function AgPaciente() { return $this->belongsTo(Paciente::class, 'id_paciente');}

}
