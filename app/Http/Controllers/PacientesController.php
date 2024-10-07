<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;

//PROYECTO HECHO POR SAMUEL DSM-43
class PacientesController extends Controller
{
    public function index()
    {
        $pacientes = Paciente::all();
        return view('pacientes.index', compact('pacientes'));
    }

    public function crear()
    {
        return view('pacientes.crear');
    }

    public function registrar(Request $request)
    {
        $paciente = new Paciente();
        $paciente->nombre = $request->nombre;
        $paciente->apellidop = $request->apellidop;
        $paciente->fecha_nacimiento = $request->fecha_nacimiento;
        $paciente->sexo = $request->sexo;
        $paciente->estatus = $request->estatus;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $path = $file->store('img', 'public');
            $paciente->foto = 'storage/' . $path;        } else {
            $paciente->foto = 'img/paciente.png';
        }
        

        $paciente->save();
        return redirect()->route('pacientes')->with('success', 'Paciente creado con éxito.');
    }

    public function editar($id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('pacientes.editar', compact('paciente'));
    }

    public function actualizar(Request $request, $id)
    {
        $paciente = Paciente::findOrFail($id);
        $paciente->nombre = $request->nombre;
        $paciente->apellidop = $request->apellidop;
        $paciente->fecha_nacimiento = $request->fecha_nacimiento;
        $paciente->sexo = $request->sexo;
        $paciente->estatus = $request->estatus;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $path = $file->store('img', 'public');
            $paciente->foto = 'storage/' . $path;
        } else {
            $paciente->foto = 'img/paciente.png';
        }
        

        $paciente->save();
        return redirect()->route('pacientes')->with('success', 'Paciente actualizado con éxito.');
    }

    public function eliminar($id)
    {
        $paciente = Paciente::findOrFail($id);
        $paciente->delete();
        return redirect()->route('pacientes')->with('success', 'Paciente eliminado con éxito.');
    }

    public function detalles($id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('pacientes.detalles', compact('paciente'));
    }
}
