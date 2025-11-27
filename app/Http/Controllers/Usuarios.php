<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\lector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Usuarios extends Controller
{
    /**
     * Listado general
     */
    public function index()
    {
        $titulo = "Administrar usuarios";

        // Cargamos solo usuarios (administradores + lectores)
        $item = User::all();

        return view('modules.usuarios.index', compact('titulo', 'item'));
    }


    /**
     * Formulario de creación
     */
    public function create()
    {
        $titulo = "Crear usuario";
        return view('modules.usuarios.create', compact('titulo'));
    }


    /**
     * Guardar usuario (admin o lector)
     */
    public function store(Request $request)
    {
        // Crear usuario base
        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->rol_usuario = $request->rol_usuario;
        $usuario->activo = 1; // por defecto activo
        $usuario->save();

        // Si el usuario es lector, guardar en tabla lector
        if ($request->rol_usuario == "lector") {
            lector::create([
                'telefono_lector' => $request->telefono_lector,
                'cip_lector'      => $request->cip_lector,
                'id_usuario'      => $usuario->id
            ]);
        }

        return to_route('usuarios');
    }


    /**
     * Mostrar formulario de edición
     */
    public function edit($id)
    {
        $titulo = "Editar usuario";
        $item = User::find($id);
        $lector = lector::where('id_usuario', $id)->first(); // si existe

        return view('modules.usuarios.edit', compact('item','lector','titulo'));
    }


    /**
     * Actualizar usuario
     */
    public function update(Request $request, $id)
    {
        $usuario = User::find($id);

        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->rol_usuario = $request->rol_usuario;

        // Actualizar contraseña solo si se envía
        if ($request->password) {
            $usuario->password = Hash::make($request->password);
        }

        $usuario->save();

        // SI ES LECTOR → actualizar o crear registro lector
        if ($request->rol_usuario == 'lector') {

            $lector = lector::where('id_usuario',$id)->first();

            if ($lector) {
                // actualizar
                $lector->telefono_lector = $request->telefono_lector;
                $lector->cip_lector = $request->cip_lector;
                $lector->save();
            } else {
                // crear
                lector::create([
                    'telefono_lector' => $request->telefono_lector,
                    'cip_lector'      => $request->cip_lector,
                    'id_usuario'      => $id
                ]);
            }

        } else {

            // SI AHORA ES ADMIN → borrar registro de lector si existe
            lector::where('id_usuario',$id)->delete();
        }

        return to_route('usuarios');
    }


    /**
     * Mostrar pantalla de eliminar usuario
     */
    public function show($id)
    {
        $titulo = "Eliminar usuario";
        $item = User::find($id);
        return view('modules.usuarios.show', compact('item','titulo'));
    }


    /**
     * Eliminar usuario y lector si existe
     */
    public function destroy($id)
    {
        lector::where('id_usuario',$id)->delete(); // si es lector
        User::destroy($id);
        return to_route('usuarios');
    }


    /**
     * Ajax: cambiar estado activo/inactivo
     */
    public function cambiar_estado($id, $estado)
    {
        $usuario = User::find($id);

        if(!$usuario){
            return 0;
        }

        $usuario->activo = $estado;
        $usuario->save();

        return 1;
    }


    /**
     * Ajax: Recargar tbody
     */
    public function tbody()
    {
        $item = User::all();
        return view('modules.usuarios.tbody', compact('item'));
    }

}
