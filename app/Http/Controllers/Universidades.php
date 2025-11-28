<?php

namespace App\Http\Controllers;

use App\Models\universidad;
use Illuminate\Http\Request;

class Universidades extends Controller
{
    public function index(){
        $titulo = "Universidades";
        $item = universidad::all();
        return view('modules.Universidades.index', compact('titulo','item'));
    }

    public function create(){
        $titulo = "Crear Universidad";
        return view('modules.Universidades.create', compact('titulo'));
    }

    public function store(Request $request){
        $item = new universidad();
        $item->nombre_universidad = $request->nombre_universidad;
        $item->save();

        return to_route('universidades')->with('success','Universidad creada');
    }

    public function storeAjax(Request $request){
        $item = universidad::create([
            'nombre_universidad' => $request->nombre_universidad
        ]);

        return response()->json([
            'id' => $item->id,
            'nombre_universidad' => $item->nombre_universidad
        ]);
    }

    public function edit($id){
        $titulo = "Editar Universidad";
        $item = universidad::findOrFail($id);
        return view('modules.Universidades.edit', compact('titulo','item'));
    }

    public function update(Request $request, $id){
        $item = universidad::findOrFail($id);
        $item->nombre_universidad = $request->nombre_universidad;
        $item->save();

        return to_route('universidades')->with('success','Universidad actualizada');
    }

    public function show($id){
        $titulo = "Eliminar Universidad";
        $item = universidad::findOrFail($id);
        return view('modules.Universidades.show', compact('titulo','item'));
    }

    public function destroy($id){
        $item = universidad::findOrFail($id);
        $item->delete();

        return to_route('universidades')->with('success','Universidad eliminada');
    }
}
