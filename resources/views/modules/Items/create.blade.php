@extends('layouts.main')

@section('titulo', $titulo)
@section('contenido')
<main id="main" class="main">

<div class="pagetitle">
  <h1>Agregar ítem</h1>
</div>

<section class="section">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Ingresa los datos del nuevo ítem</h5>

          <form action="{{ route('items.store') }}" method="POST">
            @csrf

            <label>Categoría</label>
            <select class="form-control" name="id_categoria" required>
              <option value="">Seleccione</option>
              @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nombre_categoria }}</option>
              @endforeach
            </select>

            <label class="mt-3">Nombre del ítem</label>
            <input type="text" class="form-control" name="nombre_item" required>

            <label class="mt-3">Año del ítem</label>
            <input type="number" class="form-control" name="anio_item" min="1900" max="2099" required>

            <label class="mt-3">¿Tiene disco?</label>
            <select class="form-control" name="disco_item" required>
              <option value="0">No</option>
              <option value="1">Sí</option>
            </select>

            <button class="btn btn-primary mt-3">Guardar</button>

          </form>

        </div>
      </div>
    </div>
  </div>
</section>

</main>
@endsection
