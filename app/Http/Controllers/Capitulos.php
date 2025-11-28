<?php

namespace App\Http\Controllers;

use App\Models\capitulo;
use Illuminate\Http\Request;

class Capitulos extends Controller
{
    public function index()
    {
        $titulo = 'Listado de Capítulos';
        $item = capitulo::all();
        return view('modules.Capitulos.index', compact('titulo', 'item'));
    }

    public function create()
    {
        $titulo = 'Crear capítulo';
        return view('modules.Capitulos.create', compact('titulo'));
    }

    public function store(Request $request)
    {
        $item = new capitulo();
        $item->nombre_capitulo = $request->nombre_capitulo;
        $item->save();

        return to_route('capitulos');
    }

    public function show($id)
    {
        $titulo = 'Eliminar capítulo';
        $item = capitulo::find($id);
        return view('modules.Capitulos.show', compact('titulo', 'item'));
    }

    public function edit($id)
    {
        $titulo = 'Editar capítulo';
        $item = capitulo::find($id);
        return view('modules.Capitulos.edit', compact('titulo', 'item'));
    }

    public function update(Request $request, $id)
    {
        $item = capitulo::find($id);
        $item->nombre_capitulo = $request->nombre_capitulo;
        $item->save();

        return to_route('capitulos');
    }

    public function destroy($id)
    {
        $item = capitulo::find($id);
        $item->delete();

        return to_route('capitulos');
    }
}
