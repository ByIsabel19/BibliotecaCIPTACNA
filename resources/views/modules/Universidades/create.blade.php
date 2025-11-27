@extends('layouts.main')

@section('titulo', $titulo)
@section('contenido')
<main id="main" class="main">

<div class="pagetitle">
  <h1>Agregar universidad</h1>
</div>

<section class="section">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Ingresa los datos de la nueva universidad</h5>

          <form action="{{route('universidades.store')}}" method="POST">
            @csrf
            <label for="">Nombre de universidad</label>
            <input type="text" class="form-control" required name="nombre_universidad" id="nombre_universidad">
            
            <button class="btn btn-primary mt-3">Guardar</button>
            <a href="{{route('universidades')}}" class="btn btn-info mt-3">Cancelar</a>
          </form>

        </div>
      </div>
    </div>
  </div>
</section>

</main>
@endsection
