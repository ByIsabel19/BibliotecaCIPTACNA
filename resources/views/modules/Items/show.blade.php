@extends('layouts.main')

@section('titulo', $titulo)
@section('contenido')
<main id="main" class="main">

<div class="pagetitle">
  <h1>Eliminar ítem</h1>
</div>

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">¿Desea eliminar este ítem?</h5>

          <ul>
            <li><strong>Categoría:</strong> {{ $item->categoria->nombre_categoria ?? '-' }}</li>
            <li><strong>Título:</strong> {{ $item->nombre_item }}</li>
            <li><strong>Año:</strong> {{ $item->anio_item }}</li>
            <li><strong>Autores:</strong>
              <ul>
                @foreach($item->autores as $a)
                  <li>{{ $a->nombre_autor }}</li>
                @endforeach
              </ul>
            </li>
            <li><strong>Universidad:</strong> {{ optional($item->detalle)->universidad->nombre_universidad ?? '-' }}</li>
            <li><strong>Carrera:</strong> {{ optional($item->detalle)->carrera->nombre_carrera ?? '-' }}</li>
            <li><strong>Disco:</strong> {{ $item->disco_item ? 'Sí' : 'No' }}</li>
          </ul>

          <form action="{{ route('items.destroy', $item->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Eliminar</button>
            <a href="{{ route('items') }}" class="btn btn-secondary">Cancelar</a>
          </form>

        </div>
      </div>

    </div>
  </div>
</section>

</main>
@endsection
