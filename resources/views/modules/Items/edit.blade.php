@extends('layouts.main')

@section('titulo', $titulo)
@section('contenido')

<main id="main" class="main">

<div class="pagetitle">
  <h1>Editar Ítem</h1>
</div>

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">

          <h5 class="card-title">Modificar datos del ítem</h5>

          <form method="POST" action="{{ route('items.update', $item->id) }}">
            @csrf
            @method('PUT')

            <label>Categoría</label>
            <select name="id_categoria" class="form-control" required>
              @foreach($categorias as $c)
                <option value="{{ $c->id }}" {{ $item->id_categoria == $c->id ? 'selected' : '' }}>
                  {{ $c->nombre_categoria }}
                </option>
              @endforeach
            </select>

            <label class="mt-3">Nombre del ítem</label>
            <input type="text" class="form-control" name="nombre_item" value="{{ $item->nombre_item }}" required>

            <label class="mt-3">Año</label>
            <input type="number" class="form-control" name="anio_item" value="{{ $item->anio_item }}" required min="1900" max="{{ date('Y') }}">

            <label class="mt-3">¿Tiene disco?</label>
            <select name="disco_item" class="form-control">
              <option value="0" {{ $item->disco_item == 0 ? 'selected' : '' }}>No</option>
              <option value="1" {{ $item->disco_item == 1 ? 'selected' : '' }}>Sí</option>
            </select>

            <button class="btn btn-warning mt-3">
              <i class="fa-solid fa-pen-to-square"></i> Actualizar
            </button>

            <a href="{{ route('items') }}" class="btn btn-secondary mt-3">Cancelar</a>

          </form>

        </div>
      </div>

    </div>
  </div>
</section>

</main>

@endsection
