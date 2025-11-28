<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Capitulo;
use Illuminate\Http\Request;

class Carreras extends Controller
{
    public function index()
    {
        $titulo = "Carreras";
        $carreras = Carrera::with('capitulo')->get();

        return view('modules.Carreras.index', compact('titulo', 'carreras'));
    }

    public function create()
    {
        $titulo = "Registrar Carrera";
        $capitulos = Capitulo::all();

        return view('modules.Carreras.create', compact('titulo', 'capitulos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_carrera' => 'required',
            'id_capitulo' => 'required'
        ]);

        Carrera::create([
            'nombre_carrera' => $request->nombre_carrera,
            'id_capitulo' => $request->id_capitulo
        ]);

        return redirect()->route('carreras.index')
                         ->with('success', 'Carrera registrada correctamente');
    }

    public function edit($id)
    {
        $titulo = "Editar Carrera";
        $carrera = Carrera::findOrFail($id);
        $capitulos = Capitulo::all();

        return view('modules.Carreras.edit', compact('titulo','carrera','capitulos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_carrera' => 'required',
            'id_capitulo' => 'required'
        ]);

        $carrera = Carrera::findOrFail($id);

        $carrera->update([
            'nombre_carrera' => $request->nombre_carrera,
            'id_capitulo' => $request->id_capitulo
        ]);

        return redirect()->route('carreras.index')
                         ->with('success', 'Carrera actualizada correctamente');
    }

    public function show($id)
    {
        $titulo = "Eliminar Carrera";
        $carrera = Carrera::findOrFail($id);

        return view('modules.Carreras.show', compact('titulo','carrera'));
    }

    public function destroy($id)
    {
        $carrera = Carrera::findOrFail($id);
        $carrera->delete();

        return redirect()->route('carreras.index')
                         ->with('success', 'Carrera eliminada correctamente');
    }
}
