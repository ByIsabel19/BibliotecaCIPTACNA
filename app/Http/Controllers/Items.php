<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\item;
use App\Models\categoria;
use App\Models\autor;
use App\Models\universidad;
use App\Models\carrera;
use App\Models\capitulo;
use App\Models\detalle;
use Illuminate\Support\Facades\Log;

class Items extends Controller
{
    /**
     * Mostrar listado con filtros — entrega también las colecciones necesarias para los selects
     */
    public function index(Request $request)
    {
        $titulo = "Listado de Ítems";

        // variables para selects en la vista
        $categorias = categoria::orderBy('nombre_categoria')->get();
        $autores = autor::orderBy('nombre_autor')->get();
        $universidades = universidad::orderBy('nombre_universidad')->get();
        $carreras = carrera::with('capitulo')->orderBy('nombre_carrera')->get();
        $capitulos = capitulo::orderBy('nombre_capitulo')->get();
        $anios = item::select('anio_item')->distinct()->orderBy('anio_item','desc')->pluck('anio_item');

        // Query base con relaciones
        $query = item::with(['categoria','autores','detalle.universidad','detalle.carrera.capitulo']);

        // Aplicar filtros si vienen en request
        if ($request->filled('categoria')) {
            $query->where('id_categoria', $request->categoria);
        }
        if ($request->filled('autor')) {
            $query->whereHas('autores', function($q) use ($request) {
                $q->where('autor.id', $request->autor)->orWhere('autor.id', $request->autor);
            });
        }
        if ($request->filled('universidad')) {
            $query->whereHas('detalle', function($q) use ($request) {
                $q->where('id_universidad', $request->universidad);
            });
        }
        if ($request->filled('carrera')) {
            $query->whereHas('detalle', function($q) use ($request) {
                $q->where('id_carrera', $request->carrera);
            });
        }
        if ($request->filled('capitulo')) {
            $query->whereHas('detalle.carrera', function($q) use ($request) {
                $q->where('id_capitulo', $request->capitulo);
            });
        }
        if ($request->filled('anio')) {
            $query->where('anio_item', $request->anio);
        }
        if ($request->filled('titulo')) {
            $query->where('nombre_item', 'LIKE', '%' . $request->titulo . '%');
        }

        $items = $query->orderBy('id','desc')->get();

        return view('modules.Items.index', compact(
            'titulo','items','categorias','autores','universidades','carreras','capitulos','anios'
        ));
    }

    /**
     * Mostrar vista crear
     */
    public function create()
    {
        $titulo = "Registrar nuevo Ítem";
        $categorias = categoria::orderBy('nombre_categoria')->get();
        $autores = autor::orderBy('nombre_autor')->get();
        $universidades = universidad::orderBy('nombre_universidad')->get();
        $carreras = carrera::with('capitulo')->orderBy('nombre_carrera')->get();

        return view('modules.Items.create', compact('titulo','categorias','autores','universidades','carreras'));
    }

    /**
     * Guardar nuevo ítem
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_categoria' => 'required|exists:categoria,id',
            'nombre_item' => 'required|string|max:200',
            'anio_item' => 'required|integer|min:1900|max:' . date('Y'),
            'autores' => 'nullable|array',
            'autores.*' => 'exists:autor,id',
        ]);

        try {
            $item = item::create([
                'id_categoria' => $request->id_categoria,
                'nombre_item' => $request->nombre_item,
                'anio_item' => $request->anio_item,
                'disco_item' => $request->has('disco_item') ? 1 : 0,
            ]);

            if ($request->has('autores')) {
                $item->autores()->sync($request->autores);
            }

            if ($request->filled('id_universidad') && $request->filled('id_carrera')) {
                detalle::create([
                    'id_item' => $item->id,
                    'id_universidad' => $request->id_universidad,
                    'id_carrera' => $request->id_carrera,
                ]);
            }

            return to_route('items')->with('success','Ítem creado correctamente');
        } catch (\Throwable $e) {
            Log::error('Error store Item: '.$e->getMessage());
            return back()->withInput()->withErrors(['error'=>'Error al guardar el ítem.']);
        }
    }

    /**
     * Mostrar formulario editar
     */
    public function edit($id)
    {
        $titulo = "Editar Ítem";
        $item = item::with(['autores','detalle'])->findOrFail($id);
        $categorias = categoria::orderBy('nombre_categoria')->get();
        $autores = autor::orderBy('nombre_autor')->get();
        $universidades = universidad::orderBy('nombre_universidad')->get();
        $carreras = carrera::with('capitulo')->orderBy('nombre_carrera')->get();

        return view('modules.Items.edit', compact('titulo','item','categorias','autores','universidades','carreras'));
    }

    /**
     * Actualizar
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_categoria' => 'required|exists:categoria,id',
            'nombre_item' => 'required|string|max:200',
            'anio_item' => 'required|integer|min:1900|max:' . date('Y'),
            'autores' => 'nullable|array',
            'autores.*' => 'exists:autor,id',
        ]);

        try {
            $item = item::findOrFail($id);
            $item->update([
                'id_categoria' => $request->id_categoria,
                'nombre_item' => $request->nombre_item,
                'anio_item' => $request->anio_item,
                'disco_item' => $request->has('disco_item') ? 1 : 0,
            ]);

            $item->autores()->sync($request->autores ?? []);

            if ($item->detalle) {
                $item->detalle->update([
                    'id_universidad' => $request->id_universidad,
                    'id_carrera' => $request->id_carrera,
                ]);
            } else if ($request->filled('id_universidad') && $request->filled('id_carrera')) {
                detalle::create([
                    'id_item' => $item->id,
                    'id_universidad' => $request->id_universidad,
                    'id_carrera' => $request->id_carrera,
                ]);
            }

            return to_route('items')->with('success','Ítem actualizado correctamente');
        } catch (\Throwable $e) {
            Log::error('Error update Item: '.$e->getMessage());
            return back()->withInput()->withErrors(['error'=>'Error al actualizar el ítem.']);
        }
    }

    /**
     * Mostrar confirmación eliminar
     */
    public function show($id)
    {
        $titulo = "Eliminar Ítem";
        $item = item::with(['categoria','autores','detalle.universidad','detalle.carrera.capitulo'])->findOrFail($id);
        return view('modules.Items.show', compact('titulo','item'));
    }

    /**
     * Eliminar
     */
    public function destroy($id)
    {
        try {
            $item = item::findOrFail($id);
            $item->autores()->detach();
            if ($item->detalle) $item->detalle->delete();
            $item->delete();
            return to_route('items')->with('success','Ítem eliminado correctamente');
        } catch (\Throwable $e) {
            Log::error('Error delete Item: '.$e->getMessage());
            return back()->withErrors(['error'=>'Error al eliminar el ítem.']);
        }
    }
}
