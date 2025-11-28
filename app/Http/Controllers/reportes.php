<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\User;
use App\Models\Lector;
use App\Models\Autor;
use App\Models\Item;
use App\Models\Carrera;
use App\Models\Universidad;

class Reportes extends Controller
{
    // muestra la página con el selector y el iframe
    public function index()
    {
        $titulo = "Generación de Reportes";
        // si tu vista está en resources/views/modules/Reportes/index.blade.php
        return view('modules.Reportes.index', compact('titulo'));
        // Si moviste la vista a resources/views/reportes/index.blade.php
        // return view('reportes.index', compact('titulo'));
    }

    // recibe POST { tipo: "items" | "usuarios" | ... }
    public function generar(Request $request)
    {
        $tipo = $request->input('tipo');

        switch ($tipo) {

            case 'usuarios':
                // usuarios (admins/otros) y lectores
                $usuarios = User::where('rol_usuario', 'administrador')->get(); // o ajusta según tu lógica
                $lectores = Lector::with('usuario')->get();
                return Pdf::loadView('modules.Reportes.usuarios', compact('usuarios', 'lectores'))
                          ->stream('usuarios.pdf');

            case 'autores':
                $autores = Autor::withCount('items')->get();
                return Pdf::loadView('modules.Reportes.autores', compact('autores'))
                          ->stream('autores.pdf');

            case 'items':
                $items = Item::with(['categoria', 'autores', 'carrera', 'universidad'])->get();
                return Pdf::loadView('modules.Reportes.items', compact('items'))
                          ->stream('items.pdf');

            case 'carreras':
                $carreras = Carrera::with('capitulo')->get();
                return Pdf::loadView('modules.Reportes.carreras', compact('carreras'))
                          ->stream('carreras.pdf');

            case 'universidades':
                $universidades = Universidad::with('items')->get();
                return Pdf::loadView('modules.Reportes.universidades', compact('universidades'))
                          ->stream('universidades.pdf');

            default:
                return back()->with('error', 'Tipo de reporte no válido');
        }
    }
}
