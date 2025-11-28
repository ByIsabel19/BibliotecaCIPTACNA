@extends('layouts.main')

@section('titulo', $titulo)

@section('contenido')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Ítems bibliográficos</h1>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Consultar ítems</h5>

                        <!-- FILTROS -->
                        <form method="GET" action="{{ route('items') }}">
                            <div class="row">

                                <div class="col-md-3 mb-2">
                                    <label class="form-label">Filtrar por categoría</label>
                                    <select name="categoria" class="form-control">
                                        <option value="">Todos</option>
                                        @foreach ($categorias as $c)
                                            <option value="{{ $c->id }}" {{ request('categoria') == $c->id ? 'selected' : '' }}>
                                                {{ $c->nombre_categoria }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-3 mb-2">
                                    <label class="form-label">Filtrar por autor</label>
                                    <select name="autor" class="form-control">
                                        <option value="">Todos</option>
                                        @foreach ($autores as $a)
                                            <option value="{{ $a->id }}" {{ request('autor') == $a->id ? 'selected' : '' }}>
                                                {{ $a->nombre_autor }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-3 mb-2">
                                    <label class="form-label">Filtrar por universidad</label>
                                    <select name="universidad" class="form-control">
                                        <option value="">Todas</option>
                                        @foreach ($universidades as $u)
                                            <option value="{{ $u->id }}" {{ request('universidad') == $u->id ? 'selected' : '' }}>
                                                {{ $u->nombre_universidad }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-3 mb-2">
                                    <label class="form-label">Filtrar por carrera</label>
                                    <select name="carrera" class="form-control">
                                        <option value="">Todas</option>
                                        @foreach ($carreras as $c)
                                            <option value="{{ $c->id }}" {{ request('carrera') == $c->id ? 'selected' : '' }}>
                                                {{ $c->nombre_carrera }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-3 mb-2">
                                    <label class="form-label">Filtrar por capítulo</label>
                                    <select name="capitulo" class="form-control">
                                        <option value="">Todos</option>
                                        @foreach ($capitulos as $cap)
                                            <option value="{{ $cap->id }}" {{ request('capitulo') == $cap->id ? 'selected' : '' }}>
                                                {{ $cap->nombre_capitulo }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-3 mb-2">
                                    <label class="form-label">Filtrar por año</label>
                                    <input type="number" name="anio" class="form-control"
                                           value="{{ request('anio') }}">
                                </div>

                                <div class="col-md-6 mb-2">
                                    <label class="form-label">Buscar por título</label>
                                    <input type="text" name="titulo" class="form-control"
                                           placeholder="Ingrese texto…" value="{{ request('titulo') }}">
                                </div>

                            </div>

                            <button class="btn btn-primary mt-2">Aplicar filtros</button>
                        </form>

                        <hr>

                        <!-- TABLA DE ITEMS -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Categoría</th>
                                    <th>Título</th>
                                    <th>Autores</th>
                                    <th>Año</th>
                                    <th>Universidad</th>
                                    <th>Carrera</th>
                                    <th>Capítulo</th>
                                    <th>Disco</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($items as $i)
                                <tr>
                                    <td>{{ $i->categoria->nombre_categoria }}</td>
                                    <td>{{ $i->nombre_item }}</td>

                                    <td>
                                        @foreach ($i->autores as $a)
                                            • {{ $a->nombre_autor }} <br>
                                        @endforeach
                                    </td>

                                    <td>{{ $i->anio_item }}</td>

                                    <td>{{ $i->detalle->universidad->nombre_universidad ?? '-' }}</td>

                                    <td>{{ $i->detalle->carrera->nombre_carrera ?? '-' }}</td>

                                    <td>{{ $i->detalle->carrera->capitulo->nombre_capitulo ?? '-' }}</td>

                                    <td>
                                        @if ($i->disco_item)
                                            <span class="badge bg-success">Sí</span>
                                        @else
                                            <span class="badge bg-secondary">No</span>
                                        @endif
                                    </td>

                                    <td>
                                        <a href="{{ route('items.edit', $i->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a href="{{ route('items.show', $i->id) }}" class="btn btn-danger btn-sm">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>

                    </div>
                </div>

            </div>
        </div>
    </section>

</main>
@endsection
