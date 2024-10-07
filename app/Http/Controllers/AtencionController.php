<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Hospital;
use App\Models\Medico;
use App\Models\Paciente;
use App\Models\AtencionMedica;

//PROYECTO HECHO POR SAMUEL DSM-43
class AtencionController extends Controller
{
    public function asignacion() {
        return view('asignacion')
            ->with(['hospital' => Hospital::all()])
            ->with(['medico' => Medico::all()])
            ->with(['paciente' => Paciente::all()])
            ->with(['asignaciones' => AtencionMedica::all()]);
    }
    
    public function asignacion_registrar(Request $request) {
        AtencionMedica::create([
            'id_hospital' => $request->input('id_hospital'),
            'id_medico' => $request->input('id_medico'),
            'id_paciente' => $request->input('id_paciente'),
            'detalles' => $request->input('detalles')
        ]);
    
        return redirect()->route('asignacion');
    }
    
    public function asignacion_borrar($id) {
        $asignacion = AtencionMedica::find($id);
        
        if ($asignacion) {
            $asignacion->delete();
            Session::flash('mensaje', 'Registro borrado');
        } else {
            Session::flash('mensaje', 'No se encontró el registro');
        }
        
        return redirect()->route('asignacion');
    }
}
