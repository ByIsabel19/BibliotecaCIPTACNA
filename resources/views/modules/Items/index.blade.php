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

          <h5 class="card-title">Filtros de búsqueda</h5>

          {{-- FILTROS --}}
          <form method="GET" action="{{ route('items') }}">
            <div class="row">

              {{-- CATEGORÍA --}}
              <div class="col-md-4 mt-2">
                <label>Categoría</label>
                <select class="form-control" name="categoria">
                  <option value="">Todas</option>
                  @foreach ($categorias as $c)
                  <option value="{{ $c->id }}" {{ request('categoria')==$c->id?'selected':'' }}>{{ $c->nombre_categoria }}</option>
                  @endforeach
                </select>
              </div>

              {{-- AUTOR --}}
              <div class="col-md-4 mt-2">
                <label>Autor</label>
                <select class="form-control" name="autor">
                  <option value="">Todos</option>
                  @foreach ($autores as $a)
                  <option value="{{ $a->id }}" {{ request('autor')==$a->id?'selected':'' }}>{{ $a->nombre_autor }}</option>
                  @endforeach
                </select>
              </div>

              {{-- CARRERA --}}
              <div class="col-md-4 mt-2">
                <label>Carrera</label>
                <select class="form-control" name="carrera">
                  <option value="">Todas</option>
                  @foreach ($carreras as $ca)
                  <option value="{{ $ca->id }}" {{ request('carrera')==$ca->id?'selected':'' }}>{{ $ca->nombre_carrera }}</option>
                  @endforeach
                </select>
              </div>

              {{-- CAPÍTULO --}}
              <div class="col-md-4 mt-3">
                <label>Capítulo</label>
                <select class="form-control" name="capitulo">
                  <option value="">Todos</option>
                  @foreach ($capitulos as $cap)
                  <option value="{{ $cap->id }}" {{ request('capitulo')==$cap->id?'selected':'' }}>{{ $cap->nombre_capitulo }}</option>
                  @endforeach
                </select>
              </div>

              {{-- UNIVERSIDAD --}}
              <div class="col-md-4 mt-3">
                <label>Universidad</label>
                <select class="form-control" name="universidad">
                  <option value="">Todas</option>
                  @foreach ($universidades as $u)
                  <option value="{{ $u->id }}" {{ request('universidad')==$u->id?'selected':'' }}>{{ $u->nombre_universidad }}</option>
                  @endforeach
                </select>
              </div>

              {{-- AÑO --}}
              <div class="col-md-4 mt-3">
                <label>Año</label>
                <select class="form-control" name="anio">
                  <option value="">Todos</option>
                  @foreach ($anios as $an)
                  <option value="{{ $an }}" {{ request('anio')==$an?'selected':'' }}>{{ $an }}</option>
                  @endforeach
                </select>
              </div>

              {{-- TÍTULO --}}
              <div class="col-md-6 mt-3">
                <label>Título contiene:</label>
                <input type="text" name="titulo" class="form-control" value="{{ request('titulo') }}">
              </div>

              <div class="col-md-2 mt-4">
                <button class="btn btn-secondary form-control mt-1">Buscar</button>
              </div>

            </div>
          </form>

          <hr>

          {{-- TABLA DE RESULTADOS --}}
          <table class="table datatable">
            <thead>
              <tr>
                <th>Categoría</th>
                <th>Autor</th>
                <th>Carrera</th>
                <th>Capítulo</th>
                <th>Universidad</th>
                <th>Nombre</th>
                <th>Año</th>
                <th>Disco</th>
                <th>Editar</th>
                <th>Eliminar</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($items as $i)
              <tr>
                <td>{{ $i->categoria->nombre_categoria ?? '-' }}</td>
                <td>{{ $i->autor->nombre_autor ?? '-' }}</td>
                <td>{{ $i->carrera->nombre_carrera ?? '-' }}</td>
                <td>{{ $i->capitulo->nombre_capitulo ?? '-' }}</td>
                <td>{{ $i->universidad->nombre_universidad ?? '-' }}</td>
                <td>{{ $i->nombre_item }}</td>
                <td>{{ $i->anio_item }}</td>
                <td>{{ $i->disco_item ? 'Sí' : 'No' }}</td>

                <td>
                  <a href="{{ route('items.edit', $i->id) }}" class="btn btn-warning">
                    <i class="fa-solid fa-pen"></i>
                  </a>
                </td>

                <td>
                  <a href="{{ route('items.show', $i->id) }}" class="btn btn-danger">
                    <i class="fa-solid fa-trash"></i>
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
