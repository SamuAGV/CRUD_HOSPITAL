<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;

//PROYECTO HECHO POR SAMUEL DSM-43
class HospitalController extends Controller
{
    public function hospitales()
    {
        return view('hospitales.index')->with(['hospitales' => Hospital::all()]);
    }

    public function crearHospital()
    {
        return view('hospitales.crear');
    }

    public function registrarHospital(Request $request)
    {
        $this->validate($request, [
            'clave' => 'required',
            'nombre' => 'required',
            'estatus' => 'required'
        ]);


        if ($request->file('foto')) {
            $foto = $request->file('foto');

            $img = $foto->getClientOriginalName();

            $ldate = date('Ymd_His_');
            $fotoPath = 'img/' . $ldate . $img; 

            $foto->move(public_path('img'), $fotoPath);
        } else {
            $fotoPath = 'img/hospital.jpg';
        }

        Hospital::create([
            'clave' => $request->input('clave'),
            'nombre' => $request->input('nombre'),
            'estatus' => $request->input('estatus'),
            'foto' => $fotoPath
        ]);

        return redirect()->route('hospitales');
    }

    public function editarHospital($id)
    {
        $hospital = Hospital::find($id);
        return view('hospitales.editar')->with(['hospital' => $hospital]);
    }

    public function actualizarHospital(Request $request, $id)
    {
        $hospital = Hospital::find($id);
        $hospital->clave =  $request->input('clave');
        $hospital->nombre = $request->input('nombre');
        $hospital->estatus = $request->input('estatus');

        if ($request->file('foto')) {
            $foto = $request->file('foto');
            $img = $foto->getClientOriginalName();
            $ldate = date('Ymd_His_');
            $fotoPath = 'img/' . $ldate . $img;

            $foto->move(public_path('img'), $fotoPath);
            $hospital->foto = $fotoPath;
        }

        $hospital->save();

        return redirect()->route('hospitales');
    }

    public function eliminarHospital($id)
    {
        $hospital = Hospital::find($id);
        $hospital->delete();
        return redirect()->route('hospitales');
    }

    public function detallesHospital($id)
    {
        $hospital = Hospital::find($id);
        return view('hospitales.detalles')->with(['hospital' => $hospital]);
    }
}
