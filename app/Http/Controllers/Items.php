<?php

namespace App\Http\Controllers;

use App\Models\item;
use App\Models\categoria;
use App\Models\autor;
use App\Models\carrera;
use App\Models\capitulo;
use App\Models\universidad;
use Illuminate\Http\Request;

class Items extends Controller
{
    /**
     * Mostrar listado + filtros
     */
    public function index(Request $request)
    {
        $titulo = "Consultar ítems";

        // Datos para filtros
        $categorias = categoria::all();
        $autores = autor::all();
        $carreras = carrera::all();
        $capitulos = capitulo::all();
        $universidades = universidad::all();
        $anios = item::select('anio_item')->distinct()->orderBy('anio_item', 'desc')->pluck('anio_item');

        // Consulta base
        $query = item::query()->with([
            'categoria',
            'autor',
            'carrera',
            'capitulo',
            'universidad'
        ]);

        // Aplicar filtros
        if ($request->categoria) {
            $query->where('id_categoria', $request->categoria);
        }

        if ($request->autor) {
            $query->where('id_autor', $request->autor);
        }

        if ($request->carrera) {
            $query->where('id_carrera', $request->carrera);
        }

        if ($request->capitulo) {
            $query->where('id_capitulo', $request->capitulo);
        }

        if ($request->universidad) {
            $query->where('id_universidad', $request->universidad);
        }

        if ($request->anio) {
            $query->where('anio_item', $request->anio);
        }

        if ($request->titulo) {
            $query->where('nombre_item', 'LIKE', '%' . $request->titulo . '%');
        }

        $items = $query->get();

        return view('modules.Items.index', compact(
            'titulo',
            'items',
            'categorias',
            'autores',
            'carreras',
            'capitulos',
            'universidades',
            'anios'
        ));
    }

    /**
     * Mostrar formulario para agregar item
     */
    public function create()
    {
        $titulo = "Agregar ítem";

        $categorias = categoria::all();
        $autores = autor::all();
        $carreras = carrera::all();
        $capitulos = capitulo::all();
        $universidades = universidad::all();

        return view('modules.Items.create', compact(
            'titulo',
            'categorias',
            'autores',
            'carreras',
            'capitulos',
            'universidades'
        ));
    }

    /**
     * Guardar nuevo item
     */
    public function store(Request $request)
    {
        $item = new item();
        $item->id_categoria = $request->id_categoria;
        $item->id_autor = $request->id_autor;
        $item->id_carrera = $request->id_carrera;
        $item->id_capitulo = $request->id_capitulo;
        $item->id_universidad = $request->id_universidad;
        $item->nombre_item = $request->nombre_item;
        $item->anio_item = $request->anio_item;
        $item->disco_item = $request->disco_item ?? 0;
        $item->save();

        return to_route('items');
    }

    /**
     * Mostrar vista de eliminar
     */
    public function show(string $id)
    {
        $titulo = 'Eliminar ítem';
        $item = item::find($id);

        return view('modules.Items.show', compact('item', 'titulo'));
    }

    /**
     * Mostrar formulario para editar
     */
    public function edit(string $id)
    {
        $titulo = "Editar ítem";

        $item = item::find($id);
        $categorias = categoria::all();
        $autores = autor::all();
        $carreras = carrera::all();
        $capitulos = capitulo::all();
        $universidades = universidad::all();

        return view('modules.Items.edit', compact(
            'item',
            'titulo',
            'categorias',
            'autores',
            'carreras',
            'capitulos',
            'universidades'
        ));
    }

    /**
     * Actualizar ítem
     */
    public function update(Request $request, string $id)
    {
        $item = item::find($id);

        $item->id_categoria = $request->id_categoria;
        $item->id_autor = $request->id_autor;
        $item->id_carrera = $request->id_carrera;
        $item->id_capitulo = $request->id_capitulo;
        $item->id_universidad = $request->id_universidad;
        $item->nombre_item = $request->nombre_item;
        $item->anio_item = $request->anio_item;
        $item->disco_item = $request->disco_item ?? 0;

        $item->save();

        return to_route('items');
    }

    /**
     * Eliminar ítem
     */
    public function destroy(string $id)
    {
        $item = item::find($id);
        $item->delete();

        return to_route('items');
    }
}
