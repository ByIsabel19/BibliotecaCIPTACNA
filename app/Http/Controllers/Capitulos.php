<?php

namespace App\Http\Controllers;

use App\Models\capitulo;
use Illuminate\Http\Request;

class Capitulos extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titulo = "Listado de Capítulos";
        $item = capitulo::all();
        return view('modules.capitulos.index', compact('item','titulo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $titulo = "Crear Nuevo Capítulo";
       return view('modules.capitulos.create', compact('titulo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $item= new capitulo();
        $item->nombre_capitulo = $request->nombre_capitulo;
        $item->save();
        return to_route('capitulos');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $titulo='Eliminar capitulo';
        $item=capitulo::find($id);
        return view('modules.capitulos.show', compact('item','titulo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $titulo = "Editar categoria";
        $item= capitulo::find($id);
        return view('modules.capitulos.edit', compact('item','titulo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = capitulo::find($id);
        $item->nombre_capitulo = $request->nombre_capitulo;
        $item->save();
        return to_route('capitulos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = capitulo::find($id);
        $item->delete();
        return to_route('capitulos');
    }
}
