@extends('layouts.main')

@section('titulo', $titulo)

@section('contenido')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Eliminar Ítem</h1>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">¿Deseas eliminar este ítem?</h5>

                        <form action="{{ route('items.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <!-- CATEGORÍA -->
                            <div class="mb-3">
                                <label class="form-label">Categoría</label>
                                <input type="text" class="form-control" readonly
                                       value="{{ $item->categoria->nombre_categoria }}">
                            </div>

                            <!-- TÍTULO -->
                            <div class="mb-3">
                                <label class="form-label">Título del ítem</label>
                                <input type="text" class="form-control" readonly
                                       value="{{ $item->nombre_item }}">
                            </div>

                            <!-- AUTORES -->
                            <div class="mb-3">
                                <label class="form-label">Autores</label>
                                <textarea class="form-control" rows="4" readonly>
@foreach ($item->autores as $a)
• {{ $a->nombre_autor }}
@endforeach
                                </textarea>
                            </div>

                            <!-- AÑO -->
                            <div class="mb-3">
                                <label class="form-label">Año</label>
                                <input type="text" class="form-control" readonly
                                       value="{{ $item->anio_item }}">
                            </div>

                            <!-- UNIVERSIDAD -->
                            <div class="mb-3">
                                <label class="form-label">Universidad</label>
                                <input type="text" class="form-control" readonly
                                       value="{{ $item->detalle->universidad->nombre_universidad ?? '-' }}">
                            </div>

                            <!-- CARRERA -->
                            <div class="mb-3">
                                <label class="form-label">Carrera</label>
                                <input type="text" class="form-control" readonly
                                       value="{{ $item->detalle->carrera->nombre_carrera ?? '-' }}">
                            </div>

                            <!-- CAPÍTULO -->
                            <div class="mb-3">
                                <label class="form-label">Capítulo</label>
                                <input type="text" class="form-control" readonly
                                       value="{{ $item->detalle->carrera->capitulo->nombre_capitulo ?? '-' }}">
                            </div>

                            <!-- DISCO -->
                            <div class="mb-3">
                                <label class="form-label">Disco</label>
                                <input type="text" class="form-control" readonly
                                       value="{{ $item->disco_item ? 'Sí' : 'No' }}">
                            </div>

                            <button class="btn btn-danger mt-2">
                                <i class="fa-solid fa-trash-can"></i> Eliminar
                            </button>

                            <a href="{{ route('items') }}" class="btn btn-info mt-2">
                                Cancelar
                            </a>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>

</main>
@endsection
