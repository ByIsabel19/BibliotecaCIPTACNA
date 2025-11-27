<?php

namespace App\Http\Controllers;

use App\Models\lector;
use App\Models\User;
use Illuminate\Http\Request;

class Lectores extends Controller
{
    public function index()
    {
        $titulo = "Listado de Lectores";

        $lectores = lector::with('usuario')->get();

        return view('modules.Lectores.index', compact('titulo','lectores'));
    }

    public function create()
    {
        $titulo = "Registrar Lector";
        return view('modules.Lectores.create', compact('titulo'));
    }

    public function store(Request $request)
    {
        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = bcrypt('12345678');
        $usuario->rol_usuario = 'lector';
        $usuario->activo = 1;
        $usuario->save();

        lector::create([
            'telefono_lector' => $request->telefono_lector,
            'cip_lector' => $request->cip_lector,
            'id_usuario' => $usuario->id
        ]);

        return to_route('usuarios');
    }

    public function edit($id)
    {
        $titulo = "Editar Lector";
        $item = lector::find($id);

        return view('modules.Lectores.edit', compact('item','titulo'));
    }

    public function update(Request $request, $id)
    {
        $item = lector::find($id);

        $item->telefono_lector = $request->telefono_lector;
        $item->cip_lector = $request->cip_lector;
        $item->save();

        $usuario = $item->usuario;
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->save();

        return to_route('usuarios');
    }

    public function destroy($id)
    {
        $item = lector::find($id);
        $usuario = $item->usuario;

        $item->delete();
        $usuario->delete();

        return to_route('usuarios');
    }
}
