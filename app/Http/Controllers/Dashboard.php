<?php

namespace App\Http\Controllers;

use App\Models\item;
use App\Models\categoria;
use App\Models\autor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Dashboard extends Controller
{
    public function index(){

        // Contadores
        $totalItems = item::count();
        $totalCategorias = categoria::count();
        $totalAutores = autor::count();
        $totalUsuarios = User::count();

        // Gráfico: Ítems por Categoría
        $itemsPorCategoria = categoria::select(
            'categoria.nombre_categoria as categoria',
            DB::raw('COUNT(item.id) as total')
        )
        ->leftJoin('item', 'item.id_categoria', '=', 'categoria.id')
        ->groupBy('categoria.nombre_categoria')
        ->orderBy('categoria.nombre_categoria')
        ->get();

        // Gráfico: Ítems por Año
        $itemsPorAnio = item::select(
            'anio_item',
            DB::raw('COUNT(id) as total')
        )
        ->groupBy('anio_item')
        ->orderBy('anio_item', 'ASC')
        ->get();

        return view('modules.dashboard.home', compact(
            'totalItems',
            'totalCategorias',
            'totalAutores',
            'totalUsuarios',
            'itemsPorCategoria',
            'itemsPorAnio'
        ));
    }
}
