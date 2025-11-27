<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use Illuminate\Http\Request;

class Categorias extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titulo='Administrar categorias';
        $item = categoria::all();
        return view('modules.Categorias.index', compact('titulo','item'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $titulo = 'Crear categoría';
        return view('modules.categorias.create', compact('titulo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $item= new categoria();
        $item->nombre_categoria = $request->nombre_categoria;
        $item->save();
        return to_route('categorias');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $titulo='Eliminar categoria';
        $item=categoria::find($id);
        return view('modules.categorias.show', compact('item','titulo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $titulo = "Editar categoria";
        $item= categoria::find($id);
        return view('modules.categorias.edit', compact('item','titulo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = categoria::find($id);
        $item->nombre_categoria = $request->nombre_categoria;
        $item->save();
        return to_route('categorias');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = categoria::find($id);
        $item->delete();
        return to_route('categorias');
    }
}
