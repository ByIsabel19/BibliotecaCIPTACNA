@extends('layouts.main')

@section('titulo', $titulo)
@section('contenido')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Consultar ítems</h1>
  </div>

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Filtros</h5>

            <form method="GET" action="{{ route('items') }}" class="row g-3">

              <div class="col-md-3">
                <label class="form-label">Categoría</label>
                <select name="categoria" class="form-control">
                  <option value="">Todas</option>
                  @foreach($categorias as $c)
                    <option value="{{ $c->id }}" {{ request('categoria') == $c->id ? 'selected':'' }}>
                      {{ $c->nombre_categoria }}
                    </option>
                  @endforeach
                </select>
              </div>

              <div class="col-md-3">
                <label class="form-label">Autor</label>
                <select name="autor" class="form-control">
                  <option value="">Todos</option>
                  @foreach($autores as $a)
                    <option value="{{ $a->id }}" {{ request('autor') == $a->id ? 'selected':'' }}>
                      {{ $a->nombre_autor }}
                    </option>
                  @endforeach
                </select>
              </div>

              <div class="col-md-3">
                <label class="form-label">Universidad</label>
                <select name="universidad" class="form-control">
                  <option value="">Todas</option>
                  @foreach($universidades as $u)
                    <option value="{{ $u->id }}" {{ request('universidad') == $u->id ? 'selected':'' }}>
                      {{ $u->nombre_universidad }}
                    </option>
                  @endforeach
                </select>
              </div>

              <div class="col-md-3">
                <label class="form-label">Carrera</label>
                <select name="carrera" class="form-control">
                  <option value="">Todas</option>
                  @foreach($carreras as $ca)
                    <option value="{{ $ca->id }}" {{ request('carrera') == $ca->id ? 'selected':'' }}>
                      {{ $ca->nombre_carrera }}
                    </option>
                  @endforeach
                </select>
              </div>

              <div class="col-md-3">
                <label class="form-label">Capítulo</label>
                <select name="capitulo" class="form-control">
                  <option value="">Todos</option>
                  @foreach($capitulos as $cap)
                    <option value="{{ $cap->id }}" {{ request('capitulo') == $cap->id ? 'selected':'' }}>
                      {{ $cap->nombre_capitulo }}
                    </option>
                  @endforeach
                </select>
              </div>

              <div class="col-md-3">
                <label class="form-label">Año</label>
                <select name="anio" class="form-control">
                  <option value="">Todos</option>
                  @foreach($anios as $an)
                    <option value="{{ $an }}" {{ request('anio') == $an ? 'selected':'' }}>
                      {{ $an }}
                    </option>
                  @endforeach
                </select>
              </div>

              <div class="col-md-4">
                <label class="form-label">Título contiene</label>
                <input type="text" name="titulo" class="form-control" value="{{ request('titulo') }}" placeholder="Palabras del título">
              </div>

              <div class="col-md-2 d-flex align-items-end">
                <button class="btn btn-primary w-100">Filtrar</button>
              </div>

            </form>

          </div>
        </div>

        <div class="card mt-3">
          <div class="card-body">
            <h5 class="card-title">Resultados</h5>

            <table class="table table-striped">
              <thead>
                <tr class="text-center">
                  <th>Categoría</th>
                  <th>Título</th>
                  <th>Autores</th>
                  <th>Año</th>
                  <th>Universidad</th>
                  <th>Carrera</th>
                  <th>Capítulo</th>
                  <th>Disco</th>
                  <th>Editar</th>
                  <th>Eliminar</th>
                </tr>
              </thead>
              <tbody>
                @foreach($items as $it)
                <tr>
                  <td>{{ $it->categoria->nombre_categoria ?? '-' }}</td>
                  <td>{{ $it->nombre_item }}</td>
                  <td>
                    @foreach($it->autores as $au)
                      {{ $au->nombre_autor }}<br>
                    @endforeach
                  </td>
                  <td>{{ $it->anio_item }}</td>
                  <td>{{ optional($it->detalle)->universidad->nombre_universidad ?? '-' }}</td>
                  <td>{{ optional($it->detalle)->carrera->nombre_carrera ?? '-' }}</td>
                  <td>{{ optional(optional($it->detalle)->carrera)->capitulo->nombre_capitulo ?? '-' }}</td>
                  <td>{{ $it->disco_item ? 'Sí' : 'No' }}</td>
                  <td class="text-center">
                    <a href="{{ route('items.edit', $it->id) }}" class="btn btn-warning btn-sm">
                      <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                  </td>
                  <td class="text-center">
                    <form action="{{ route('items.destroy', $it->id) }}" method="POST" onsubmit="return confirm('¿Eliminar este ítem?');">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                    </form>
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
