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
use Illuminate\Support\Facades\DB;

class Reportes extends Controller
{
    public function index()
    {
        $titulo = "Generación de Reportes";
        return view('modules.Reportes.index', compact('titulo'));
    }

    public function generar(Request $request)
    {
        $tipo = $request->input('tipo');

        switch ($tipo) {

            /* ===============================
               📌 REPORTE DE USUARIOS + LECTORES
               =============================== */
            case 'usuarios':
                $usuarios = User::all(); // O lo filtras si deseas
                $lectores = Lector::select('id','id_usuario','telefono_lector','cip_lector')
                  ->with('usuario')
                  ->get();
                return Pdf::loadView('modules.Reportes.usuarios',
                        compact('usuarios', 'lectores'))
                        ->stream('usuarios.pdf');

            /* ===============================
               📌 REPORTE DE AUTORES (PERFECTO)
               =============================== */
            case 'autores':
                $autores = Autor::withCount('items')->get();
                return Pdf::loadView('modules.Reportes.autores',
                        compact('autores'))
                        ->stream('autores.pdf');

            /* ===============================
               📌 REPORTE DE ITEMS - SIN UNIVERSIDAD
               =============================== */
            case 'items':
                // Solo traemos lo necesario
                $items = Item::with(['categoria', 'autores', 'carrera'])->get();

                return Pdf::loadView('modules.Reportes.items', compact('items'))
                        ->stream('items.pdf');

            /* ===============================
               📌 REPORTE DE CARRERAS (PERFECTO)
               =============================== */
            case 'carreras':
                $carreras = Carrera::with('capitulo')->get();
                return Pdf::loadView('modules.Reportes.carreras',
                        compact('carreras'))
                        ->stream('carreras.pdf');


            /* ===============================
               📌 REPORTE DE UNIVERSIDADES (2 COLUMNAS)
               =============================== */
            case 'universidades':

                $universidades = DB::table('universidad')
                    ->leftJoin('detalle', 'detalle.id_universidad', '=', 'universidad.id')
                    ->leftJoin('item', 'item.id', '=', 'detalle.id_item')
                    ->select('universidad.nombre_universidad', DB::raw('COUNT(item.id) as cantidad_items'))
                    ->groupBy('universidad.nombre_universidad')
                    ->orderBy('universidad.nombre_universidad')
                    ->get();



                return Pdf::loadView('modules.Reportes.universidades',
                        compact('universidades'))
                        ->stream('universidades.pdf');


            default:
                return back()->with('error', 'Tipo de reporte no válido');
        }
    }
}
