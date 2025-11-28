<?php

namespace App\Http\Controllers;

use App\Models\carrera;
use Illuminate\Http\Request;

class Carreras extends Controller
{
    public function index(){
        $titulo = "Carreras";
        $item = carrera::with('capitulo')->get();
        return view('modules.Carreras.index', compact('titulo','item'));
    }

    public function create(){
        $titulo = "Crear Carrera";
        $capitulos = \App\Models\capitulo::all();
        return view('modules.Carreras.create', compact('titulo','capitulos'));
    }

    public function store(Request $request){
        $item = new carrera();
        $item->nombre_carrera = $request->nombre_carrera;
        $item->id_capitulo = $request->id_capitulo;
        $item->save();

        return to_route('carreras')->with('success','Carrera creada');
    }

    public function storeAjax(Request $request){
        $item = carrera::create([
            'nombre_carrera' => $request->nombre_carrera,
            'id_capitulo' => $request->id_capitulo
        ]);

        return response()->json([
            'id' => $item->id,
            'nombre_carrera' => $item->nombre_carrera
        ]);
    }

    public function edit($id){
        $titulo = "Editar Carrera";
        $item = carrera::findOrFail($id);
        $capitulos = \App\Models\capitulo::all();
        return view('modules.Carreras.edit', compact('titulo','item','capitulos'));
    }

    public function update(Request $request, $id){
        $item = carrera::findOrFail($id);
        $item->nombre_carrera = $request->nombre_carrera;
        $item->id_capitulo = $request->id_capitulo;
        $item->save();

        return to_route('carreras')->with('success','Carrera actualizada');
    }

    public function show($id){
        $titulo = "Eliminar Carrera";
        $item = carrera::findOrFail($id);
        return view('modules.Carreras.show', compact('titulo','item'));
    }

    public function destroy($id){
        $item = carrera::findOrFail($id);
        $item->delete();

        return to_route('carreras')->with('success','Carrera eliminada');
    }
}
