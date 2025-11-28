<?php

namespace App\Http\Controllers;

use App\Models\carrera;
use App\Models\capitulo;
use Illuminate\Http\Request;

class Carreras extends Controller
{
    public function index()
    {
        $titulo = "Carreras";
        $carreras = carrera::with('capitulo')->get();

        return view('modules.Carreras.index', compact('titulo','carreras'));
    }

    public function create()
    {
        $titulo = "Agregar Carrera";
        
        // 🔥 IMPORTANTE: enviar los capítulos para el select
        $capitulos = capitulo::all();

        return view('modules.Carreras.create', compact('titulo','capitulos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_carrera' => 'required|string|max:255',
            'id_capitulo' => 'required|exists:capitulo,id'
        ]);

        carrera::create([
            'nombre_carrera' => $request->nombre_carrera,
            'id_capitulo' => $request->id_capitulo
        ]);

        return redirect()->route('carreras')->with('success', 'Carrera registrada correctamente');
    }

    public function show($id)
    {
        $carrera = carrera::with('capitulo')->findOrFail($id);
        $titulo = "Detalle de Carrera";

        return view('modules.Carreras.show', compact('titulo','carrera'));
    }

    public function edit($id)
    {
        $carrera = carrera::findOrFail($id);
        $titulo = "Editar Carrera";

        // 🔥 nuevamente se envían los capítulos
        $capitulos = capitulo::all();

        return view('modules.Carreras.edit', compact('titulo','carrera','capitulos'));
    }

    public function update(Request $request, $id)
    {
        $carrera = carrera::findOrFail($id);

        $request->validate([
            'nombre_carrera' => 'required|string|max:255',
            'id_capitulo' => 'required|exists:capitulo,id'
        ]);

        $carrera->update([
            'nombre_carrera' => $request->nombre_carrera,
            'id_capitulo' => $request->id_capitulo
        ]);

        return redirect()->route('carreras')->with('success','Carrera actualizada correctamente');
    }

    public function destroy($id)
    {
        $carrera = carrera::findOrFail($id);
        $carrera->delete();

        return redirect()->route('carreras')->with('success','Carrera eliminada correctamente');
    }
}
