<?php

namespace App\Http\Controllers;

use App\Models\autor;
use Illuminate\Http\Request;

class Autores extends Controller
{
    public function index(){
        $titulo = "Autores";
        $item = autor::all();
        return view('modules.Autores.index', compact('titulo','item'));
    }

    public function create(){
        $titulo = "Crear Autor";
        return view('modules.Autores.create', compact('titulo'));
    }

    public function store(Request $request){
        $item = new autor();
        $item->nombre_autor = $request->nombre_autor;
        $item->save();

        return to_route('autores')->with('success','Autor creado correctamente');
    }

    public function storeAjax(Request $request){
        $item = autor::create([
            'nombre_autor' => $request->nombre_autor
        ]);

        return response()->json([
            'id' => $item->id,
            'nombre_autor' => $item->nombre_autor
        ]);
    }

    public function edit($id){
        $titulo = "Editar Autor";
        $item = autor::findOrFail($id);
        return view('modules.Autores.edit', compact('titulo','item'));
    }

    public function update(Request $request, $id){
        $item = autor::findOrFail($id);
        $item->nombre_autor = $request->nombre_autor;
        $item->save();

        return to_route('autores')->with('success','Autor actualizado');
    }

    public function show($id){
        $titulo = "Eliminar Autor";
        $item = autor::findOrFail($id);
        return view('modules.Autores.show', compact('titulo','item'));
    }

    public function destroy($id){
        $item = autor::findOrFail($id);
        $item->delete();

        return to_route('autores')->with('success','Autor eliminado');
    }
}
