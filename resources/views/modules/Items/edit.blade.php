@extends('layouts.main')

@section('titulo', $titulo)

@section('contenido')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Editar ítem</h1>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Actualiza los datos del ítem</h5>

                        <form action="{{ route('items.update', $item->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- CATEGORÍA -->
                            <div class="mb-3">
                                <label class="form-label">Categoría</label>
                                <select name="id_categoria" class="form-control" required>
                                    @foreach ($categorias as $c)
                                        <option value="{{ $c->id }}"
                                            {{ $item->id_categoria == $c->id ? 'selected' : '' }}>
                                            {{ $c->nombre_categoria }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- TÍTULO -->
                            <div class="mb-3">
                                <label class="form-label">Título del ítem</label>
                                <input type="text" name="nombre_item" class="form-control"
                                       value="{{ $item->nombre_item }}" required>
                            </div>

                            <!-- AÑO -->
                            <div class="mb-3">
                                <label class="form-label">Año</label>
                                <input type="number" name="anio_item" class="form-control"
                                       min="1900" max="{{ date('Y') }}"
                                       value="{{ $item->anio_item }}" required>
                            </div>

                            <!-- AUTORES (MULTIPLE) -->
                            <div class="mb-3">
                                <label class="form-label">Autores</label>
                                <select name="autores[]" multiple class="form-control" size="6">
                                    @foreach ($autores as $a)
                                        <option value="{{ $a->id }}"
                                            {{ $item->autores->contains($a->id) ? 'selected' : '' }}>
                                            {{ $a->nombre_autor }}
                                        </option>
                                    @endforeach
                                </select>
                                <small class="text-muted">Mantén presionada la tecla CTRL para seleccionar varios.</small>
                            </div>

                            <!-- UNIVERSIDAD -->
                            <div class="mb-3">
                                <label class="form-label">Universidad</label>
                                <select name="id_universidad" class="form-control">
                                    <option value="">Seleccione…</option>
                                    @foreach ($universidades as $u)
                                        <option value="{{ $u->id }}"
                                            {{ optional($item->detalle)->id_universidad == $u->id ? 'selected' : '' }}>
                                            {{ $u->nombre_universidad }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- CARRERA -->
                            <div class="mb-3">
                                <label class="form-label">Carrera</label>
                                <select name="id_carrera" class="form-control">
                                    <option value="">Seleccione…</option>
                                    @foreach ($carreras as $c)
                                        <option value="{{ $c->id }}"
                                            {{ optional($item->detalle)->id_carrera == $c->id ? 'selected' : '' }}>
                                            {{ $c->nombre_carrera }} — (Capítulo: {{ $c->capitulo->nombre_capitulo }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- DISCO -->
                            <div class="mb-3 form-check">
                                <input class="form-check-input"
                                       type="checkbox"
                                       name="disco_item"
                                       id="disco_item"
                                       {{ $item->disco_item ? 'checked' : '' }}>
                                <label class="form-check-label" for="disco_item">
                                    Incluye disco
                                </label>
                            </div>

                            <button class="btn btn-warning">Actualizar Ítem</button>
                            <a href="{{ route('items') }}" class="btn btn-secondary">Cancelar</a>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>

</main>
@endsection
