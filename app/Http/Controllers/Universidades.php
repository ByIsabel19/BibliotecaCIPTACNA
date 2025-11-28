<?php

namespace App\Http\Controllers;

use App\Models\universidad;
use Illuminate\Http\Request;

class Universidades extends Controller
{
    public function index()
    {
        $titulo="Administrar universidades";
        $item = universidad::all();
        return view('modules.Universidades.index', compact('titulo','item'));
    }

    public function create()
    {
        $titulo="Crear universidad";
        return view('modules.Universidades.create', compact('titulo'));
    }

    public function store(Request $request)
    {
        $item = new Universidad();
        $item->nombre_universidad = $request->nombre_universidad;
        $item->save();
        return to_route('universidades');
    }

    public function show($id)
    {
        $titulo="Eliminar universidad";
        $item = universidad::find($id);
        return view('modules.Universidades.show', compact('item','titulo'));
    }

    public function edit($id)
    {
        $titulo="Editar universidad";
        $item = universidad::find($id);
        return view('modules.Universidades.edit', compact('item','titulo'));
    }

    public function update(Request $request, $id)
    {
        $item = universidad::find($id);
        $item->nombre_universidad = $request->nombre_universidad;
        $item->save();
        return to_route('universidades');
    }

    public function destroy($id)
    {
        $item = universidad::find($id);
        $item->delete();
        return to_route('universidades');
    }

    // AJAX para modal
    public function storeAjax(Request $request)
    {
        $request->validate([
            'nombre_universidad' => 'required|string|max:255'
        ]);

        $u = universidad::create([
            'nombre_universidad' => $request->nombre_universidad
        ]);

        return response()->json($u);
    }
}
