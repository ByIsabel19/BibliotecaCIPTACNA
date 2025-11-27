@extends('layouts.main')

@section('titulo', $titulo)
@section('contenido')
<main id="main" class="main">

<div class="pagetitle">
  <h1>Editar autor</h1>
</div>

<section class="section">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">

          <h5 class="card-title">Ingresa los nuevos datos del autor</h5>

          <form action="{{route('autores.update', $item->id)}}" method="POST">
            @csrf
            @method("PUT")

            <label for="">Nombre del autor</label>
            <input type="text"
                   class="form-control"
                   required
                   name="nombre_autor"
                   id="nombre_autor"
                   value="{{$item->nombre_autor}}">

            <button class="btn btn-warning mt-3">Actualizar</button>
            <a href="{{route('autores')}}" class="btn btn-info mt-3">Cancelar</a>
          </form>

        </div>
      </div>
    </div>
  </div>
</section>

</main>
@endsection
