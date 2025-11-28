<?php

namespace App\Http\Controllers;

use App\Models\item;
use App\Models\categoria;
use App\Models\autor;
use App\Models\universidad;
use App\Models\carrera;
use App\Models\capitulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Items extends Controller
{
    public function index(Request $request)
    {
        $titulo = "Consultar ítems";

        $categorias = categoria::all();
        $autores = autor::all();
        $universidades = universidad::all();
        $carreras = carrera::all();
        $capitulos = capitulo::all();
        $anios = item::select('anio_item')->distinct()->orderBy('anio_item','desc')->pluck('anio_item');

        $query = item::with(['categoria','autores','detalle.carrera.capitulo','detalle.universidad']);

        if ($request->categoria) {
            $query->where('id_categoria', $request->categoria);
        }
        if ($request->autor) {
            $query->whereHas('autores', function($q) use ($request){
                $q->where('autor.id', $request->autor);
            });
        }
        if ($request->universidad) {
            $query->whereHas('detalle', function($q) use ($request){
                $q->where('id_universidad', $request->universidad);
            });
        }
        if ($request->carrera) {
            $query->whereHas('detalle', function($q) use ($request){
                $q->where('id_carrera', $request->carrera);
            });
        }
        if ($request->capitulo) {
            $query->whereHas('detalle.carrera', function($q) use ($request){
                $q->where('id_capitulo', $request->capitulo);
            });
        }
        if ($request->anio) {
            $query->where('anio_item', $request->anio);
        }
        if ($request->titulo) {
            $query->where('nombre_item', 'LIKE', '%' . $request->titulo . '%');
        }

        $items = $query->get();

        return view('modules.Items.index', compact(
            'titulo','items','categorias','autores','universidades','carreras','capitulos','anios'
        ));
    }

    public function create()
    {
        $titulo = "Agregar ítem";
        $categorias = categoria::all();
        $autores = autor::all();
        $universidades = universidad::all();
        $carreras = carrera::all();
        $capitulos = capitulo::all();

        return view('modules.Items.create', compact(
            'titulo','categorias','autores','universidades','carreras','capitulos'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_categoria' => 'required|exists:categoria,id',
            'nombre_item' => 'required|string|max:200',
            'anio_item' => 'required|integer|min:1900|max:' . date('Y'),
            'autores' => 'nullable|array',
            'autores.*' => 'exists:autor,id',
            'id_universidad' => 'nullable|exists:universidad,id',
            'id_carrera' => 'nullable|exists:carrera,id',
            'disco_item' => 'nullable|in:0,1'
        ]);

        DB::beginTransaction();
        try {
            $item = new item();
            $item->id_categoria = $request->id_categoria;
            $item->nombre_item = $request->nombre_item;
            $item->anio_item = $request->anio_item;
            $item->disco_item = $request->disco_item ?? 0;
            $item->save();

            if ($request->autores && is_array($request->autores)) {
                // attach via pivot table
                $item->autores()->attach($request->autores);
            }

            // detalle: insert using query builder (safe if detalle model lacks PK)
            if ($request->id_universidad || $request->id_carrera) {
                DB::table('detalle')->insert([
                    'id_item' => $item->id,
                    'id_universidad' => $request->id_universidad ?? null,
                    'id_carrera' => $request->id_carrera ?? null,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }

            DB::commit();
            return to_route('items')->with('success','Ítem creado correctamente');
        } catch (\Throwable $e) {
            DB::rollBack();
            return back()->withInput()->withErrors(['error' => 'Error al guardar el ítem: '.$e->getMessage()]);
        }
    }

    public function show($id)
    {
        $titulo = "Eliminar ítem";
        $item = item::findOrFail($id);
        return view('modules.Items.show', compact('titulo','item'));
    }

    public function edit($id)
    {
        $titulo = "Editar ítem";
        $item = item::findOrFail($id);

        $categorias = categoria::all();
        $autores = autor::all();
        $universidades = universidad::all();
        $carreras = carrera::all();
        $capitulos = capitulo::all();

        $itemAutores = $item->autores->pluck('id')->toArray();

        return view('modules.Items.edit', compact(
            'titulo','item','categorias','autores','universidades','carreras','capitulos','itemAutores'
        ));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_categoria' => 'required|exists:categoria,id',
            'nombre_item' => 'required|string|max:200',
            'anio_item' => 'required|integer|min:1900|max:' . date('Y'),
            'autores' => 'nullable|array',
            'autores.*' => 'exists:autor,id',
            'id_universidad' => 'nullable|exists:universidad,id',
            'id_carrera' => 'nullable|exists:carrera,id',
            'disco_item' => 'nullable|in:0,1'
        ]);

        DB::beginTransaction();
        try {
            $item = item::findOrFail($id);
            $item->id_categoria = $request->id_categoria;
            $item->nombre_item = $request->nombre_item;
            $item->anio_item = $request->anio_item;
            $item->disco_item = $request->disco_item ?? 0;
            $item->save();

            // sync autores
            $item->autores()->sync($request->autores ?? []);

            // update detalle via query builder: delete existing detalle rows for this item and insert new (safe)
            DB::table('detalle')->where('id_item', $item->id)->delete();
            if ($request->id_universidad || $request->id_carrera) {
                DB::table('detalle')->insert([
                    'id_item' => $item->id,
                    'id_universidad' => $request->id_universidad ?? null,
                    'id_carrera' => $request->id_carrera ?? null,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }

            DB::commit();
            return to_route('items')->with('success','Ítem actualizado correctamente');
        } catch (\Throwable $e) {
            DB::rollBack();
            return back()->withInput()->withErrors(['error' => 'Error al actualizar el ítem: '.$e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        $item = item::findOrFail($id);

        DB::beginTransaction();
        try {
            // eliminar pivotes y detalle con query (evita errores de PK)
            DB::table('autoritem')->where('id_item', $item->id)->delete();
            DB::table('detalle')->where('id_item', $item->id)->delete();

            $item->delete();

            DB::commit();
            return to_route('items')->with('success','Ítem eliminado correctamente');
        } catch (\Throwable $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Error al eliminar: '.$e->getMessage()]);
        }
    }
}
