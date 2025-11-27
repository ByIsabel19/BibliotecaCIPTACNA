<?php

namespace App\Http\Controllers;

use App\Models\autor;
use Illuminate\Http\Request;

class Autores extends Controller
{
    public function index()
    {
        $titulo = 'Administrar autores';
        $item = autor::all();
        return view('modules.Autores.index', compact('titulo', 'item'));
    }

    public function create()
    {
        $titulo = 'Crear autor';
        return view('modules.Autores.create', compact('titulo'));
    }

    public function store(Request $request)
    {
        $item = new autor();
        $item->nombre_autor = $request->nombre_autor;
        $item->save();

        return to_route('autores');
    }

    public function show(string $id)
    {
        $titulo = 'Eliminar autor';
        $item = autor::find($id);
        return view('modules.Autores.show', compact('item','titulo'));
    }

    public function edit(string $id)
    {
        $titulo = 'Editar autor';
        $item = autor::find($id);
        return view('modules.Autores.edit', compact('item','titulo'));
    }

    public function update(Request $request, string $id)
    {
        $item = autor::find($id);
        $item->nombre_autor = $request->nombre_autor;
        $item->save();

        return to_route('autores');
    }

    public function destroy(string $id)
    {
        $item = autor::find($id);
        $item->delete();
        return to_route('autores');
    }
}
