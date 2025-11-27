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

          <h5 class="card-title">¿Seguro que deseas eliminar este ítem?</h5>

          <ul>
            <li><strong>Categoría:</strong> {{ $item->categoria->nombre_categoria }}</li>
            <li><strong>Nombre:</strong> {{ $item->nombre_item }}</li>
            <li><strong>Año:</strong> {{ $item->anio_item }}</li>
            <li><strong>Disco:</strong> {{ $item->disco_item ? 'Sí' : 'No' }}</li>
          </ul>

          <form action="{{ route('items.destroy', $item->id) }}" method="POST">
            @csrf
            @method('DELETE')

            <button class="btn btn-danger mt-3">
              <i class="fa-solid fa-trash"></i> Eliminar
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
