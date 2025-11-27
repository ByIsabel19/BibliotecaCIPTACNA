<?php

namespace App\Http\Controllers;

use App\Models\carrera;
use App\Models\capitulo;
use Illuminate\Http\Request;

class Carreras extends Controller
{
    public function index()
    {
        $titulo = 'Administrar carreras';
        $item = carrera::with('capitulo')->get();
        return view('modules.Carreras.index', compact('titulo', 'item'));
    }

    public function create()
    {
        $titulo = 'Crear carrera';
        $capitulos = capitulo::all();
        return view('modules.Carreras.create', compact('titulo', 'capitulos'));
    }

    public function store(Request $request)
    {
        $item = new carrera();
        $item->nombre_carrera = $request->nombre_carrera;
        $item->id_capitulo = $request->id_capitulo;
        $item->save();

        return to_route('carreras');
    }

    public function show($id)
    {
        $titulo = 'Eliminar carrera';
        $item = carrera::with('capitulo')->find($id);
        return view('modules.Carreras.show', compact('item', 'titulo'));
    }

    public function edit($id)
    {
        $titulo = "Editar carrera";
        $item = carrera::find($id);
        $capitulos = capitulo::all();
        return view('modules.Carreras.edit', compact('item', 'capitulos', 'titulo'));
    }

    public function update(Request $request, $id)
    {
        $item = carrera::find($id);
        $item->nombre_carrera = $request->nombre_carrera;
        $item->id_capitulo = $request->id_capitulo;
        $item->save();

        return to_route('carreras');
    }

    public function destroy($id)
    {
        $item = carrera::find($id);
        $item->delete();

        return to_route('carreras');
    }
}
