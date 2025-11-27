@extends('layouts.main')

@section('titulo', $titulo)
@section('contenido')
<main id="main" class="main">

<div class="pagetitle">
  <h1>Eliminar autor</h1>
</div>

<section class="section">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">

          <h5 class="card-title">¿Deseas eliminar este autor?</h5>

          <form action="{{route('autores.destroy', $item->id)}}" method="POST">
            @csrf
            @method('DELETE')

            <label for="">Nombre del autor</label>
            <input type="text" class="form-control" readonly
            name="nombre_autor" id="nombre_autor" value="{{$item->nombre_autor}}">

            <button class="btn btn-danger mt-3">Eliminar</button>
            <a href="{{route('autores')}}" class="btn btn-info mt-3">Cancelar</a>
          </form>

        </div>
      </div>
    </div>
  </div>
</section>

</main>
@endsection
