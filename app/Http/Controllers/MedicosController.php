<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medico;

//PROYECTO HECHO POR SAMUEL DSM-43
class MedicosController extends Controller
{
    public function index()
    {
        $medicos = Medico::all();
        return view('medicos.index', compact('medicos'));
    }

    public function crear()
    {
        return view('medicos.crear');
    }

    public function registrar(Request $request)
{

    $medico = new Medico();

    $medico->clave = $request->clave;
    $medico->nombre = $request->nombre;
    $medico->apellidop = $request->apellidop;
    $medico->fecha_nacimiento = $request->fecha_nacimiento;
    $medico->sexo = $request->sexo;
    $medico->email = $request->email;
    $medico->estatus = $request->estatus;

    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $ldate = date('Ymd_His_');
        $img = $file->getClientOriginalName();
        $path = 'img/' . $ldate . $img;

        $file->move(public_path('img'), $path);
        $medico->foto = $path;
    } else {
        $medico->foto = 'img/medico.png';
    }

    $medico->save();
    return redirect()->route('medicos')->with('success', 'Médico creado con éxito.');
}

    public function editar($id)
    {
        $medico = Medico::findOrFail($id);
        return view('medicos.editar', compact('medico'));
    }

    public function actualizar(Request $request, $id)
{
    $medico = Medico::findOrFail($id);
    $medico->clave = $request->clave;
    $medico->nombre = $request->nombre;
    $medico->apellidop = $request->apellidop;
    $medico->fecha_nacimiento = $request->fecha_nacimiento;
    $medico->sexo = $request->sexo;
    $medico->email = $request->email;
    $medico->estatus = $request->estatus;

    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $img = $file->getClientOriginalName();
        $ldate = date('Ymd_His_');
        $path = 'img/' . $ldate . $img;


        $file->move(public_path('img'), $path);
        $medico->foto = $path;
    }

    
    $medico->save();
    return redirect()->route('medicos')->with('success', 'Médico actualizado con éxito.');
}

    public function eliminar($id)
    {
        $medico = Medico::findOrFail($id);
        $medico->delete();
        return redirect()->route('medicos')->with('success', 'Médico eliminado con éxito.');
    }

    public function detalles($id)
    {
        $medico = Medico::findOrFail($id);
        return view('medicos.detalles', compact('medico'));
    }
}
