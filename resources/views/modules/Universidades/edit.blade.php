@extends('layouts.main')

@section('titulo', $titulo)
@section('contenido')
<main id="main" class="main">

<div class="pagetitle">
  <h1>Editar universidad</h1>
</div>

<section class="section">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Ingresa los nuevos datos de la universidad</h5>

          <form action="{{route('universidades.update', $item->id)}}" method="POST">
            @csrf
            @method("PUT")

            <label for="">Nombre de universidad</label>
            <input type="text" class="form-control"
            required name="nombre_universidad" id="nombre_universidad"
            value="{{$item->nombre_universidad}}">

            <button class="btn btn-warning mt-3">Actualizar</button>
            <a href="{{route('universidades')}}" class="btn btn-info mt-3">Cancelar</a>
          </form>

        </div>
      </div>
    </div>
  </div>
</section>

</main>
@endsection
