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
          <h5 class="card-title">Modificar ítem</h5>

          <form action="{{ route('items.update', $item->id) }}" method="POST">
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

            <label class="mt-3">Título</label>
            <input type="text" name="nombre_item" class="form-control" value="{{ $item->nombre_item }}" required>

            <label class="mt-3">Año</label>
            <input type="number" name="anio_item" class="form-control" min="1900" max="{{ date('Y') }}" value="{{ $item->anio_item }}" required>

            <label class="mt-3">Autores</label>
            <select name="autores[]" multiple class="form-control">
              @foreach($autores as $a)
                <option value="{{ $a->id }}" {{ in_array($a->id, $itemAutores ?? []) ? 'selected' : '' }}>
                  {{ $a->nombre_autor }}
                </option>
              @endforeach
            </select>

            <label class="mt-3">Universidad</label>
            <select name="id_universidad" class="form-control">
              <option value="">Opcional</option>
              @foreach($universidades as $u)
                <option value="{{ $u->id }}"
                  {{ optional($item->detalle)->id_universidad == $u->id ? 'selected' : '' }}>
                  {{ $u->nombre_universidad }}
                </option>
              @endforeach
            </select>

            <label class="mt-3">Carrera</label>
            <select name="id_carrera" class="form-control">
              <option value="">Opcional</option>
              @foreach($carreras as $ca)
                <option value="{{ $ca->id }}"
                  {{ optional($item->detalle)->id_carrera == $ca->id ? 'selected' : '' }}>
                  {{ $ca->nombre_carrera }}
                </option>
              @endforeach
            </select>

            <label class="mt-3">¿Tiene disco?</label>
            <select name="disco_item" class="form-control">
              <option value="0" {{ $item->disco_item == 0 ? 'selected' : '' }}>No</option>
              <option value="1" {{ $item->disco_item == 1 ? 'selected' : '' }}>Sí</option>
            </select>

            <button class="btn btn-warning mt-3">Actualizar</button>
            <a href="{{ route('items') }}" class="btn btn-secondary mt-3">Cancelar</a>

          </form>
        </div>
      </div>

    </div>
  </div>
</section>

</main>
@endsection
