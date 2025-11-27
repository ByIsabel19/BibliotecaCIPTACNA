<?php

namespace App\Http\Controllers;

use App\Models\universidad;
use Illuminate\Http\Request;

class Universidades extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titulo = 'Administrar universidades';
        $item = universidad::all();
        return view('modules.Universidades.index', compact('titulo', 'item'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $titulo = 'Crear universidad';
        return view('modules.Universidades.create', compact('titulo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $item = new universidad();
        $item->nombre_universidad = $request->nombre_universidad;
        $item->save();
        return to_route('universidades');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $titulo = 'Eliminar universidad';
        $item = universidad::find($id);
        return view('modules.Universidades.show', compact('item', 'titulo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $titulo = "Editar universidad";
        $item = universidad::find($id);
        return view('modules.Universidades.edit', compact('item','titulo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = universidad::find($id);
        $item->nombre_universidad = $request->nombre_universidad;
        $item->save();
        return to_route('universidades');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = universidad::find($id);
        $item->delete();
        return to_route('universidades');
    }
}
