<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HospitalController;
use App\Http\Controllers\MedicosController;
use App\Http\Controllers\PacientesController;
use App\Http\Controllers\AtencionController;

Route::get('/', function () { return view('welcome');});

//ESTAS SON MIS RUTAS PARA HOSPITALES
Route::get('/hospitales', [HospitalController::class, 'hospitales'])->name('hospitales');
Route::get('/hospitales/crear', [HospitalController::class, 'crearHospital'])->name('crearHospital');
Route::post('/hospitales/registrar', [HospitalController::class, 'registrarHospital'])->name('registrarHospital');
Route::get('/hospitales/editar/{id}', [HospitalController::class, 'editarHospital'])->name('editarHospital');
Route::post('/hospitales/actualizar/{id}', [HospitalController::class, 'actualizarHospital'])->name('actualizarHospital');
Route::get('/hospitales/eliminar/{id}', [HospitalController::class, 'eliminarHospital'])->name('eliminarHospital');
Route::get('/hospitales/detalles/{id}', [HospitalController::class, 'detallesHospital'])->name('detallesHospital');


//ESTAS SON MIS RUTAS PARA MEDICOS
Route::get('/medicos', [MedicosController::class, 'index'])->name('medicos');
Route::get('/medicos/crear', [MedicosController::class, 'crear'])->name('crearMedico');
Route::post('/medicos/registrar', [MedicosController::class, 'registrar'])->name('registrarMedico');
Route::get('/medicos/editar/{id}', [MedicosController::class, 'editar'])->name('editarMedico');
Route::post('/medicos/actualizar/{id}', [MedicosController::class, 'actualizar'])->name('actualizarMedico');
Route::get('/medicos/eliminar/{id}', [MedicosController::class, 'eliminar'])->name('eliminarMedico');
Route::get('/medicos/detalles/{id}', [MedicosController::class, 'detalles'])->name('detallesMedico');


//ESTAS SON MIS RUTAS PARA PACIENTES
Route::get('/pacientes', [PacientesController::class, 'index'])->name('pacientes');
Route::get('/pacientes/crear', [PacientesController::class, 'crear'])->name('crearPaciente');
Route::post('/pacientes/registrar', [PacientesController::class, 'registrar'])->name('registrarPaciente');
Route::get('/pacientes/{id}/editar', [PacientesController::class, 'editar'])->name('editarPaciente');
Route::post('/pacientes/{id}/actualizar', [PacientesController::class, 'actualizar'])->name('actualizarPaciente');
Route::get('/pacientes/{id}/eliminar', [PacientesController::class, 'eliminar'])->name('eliminarPaciente');
Route::get('/pacientes/{id}', [PacientesController::class, 'detalles'])->name('detallesPaciente');


//ESTAS SON MIS RUTAS PARA LA ASIGNACION
Route::get('/asignacion', [AtencionController::class, 'asignacion'])->name('asignacion');
Route::post('/asignacion/registrar', [AtencionController::class, 'asignacion_registrar'])->name('asignacion_registrar');
Route::get('/asignacion/borrar/{id}', [AtencionController::class, 'asignacion_borrar'])->name('asignacion_borrar');