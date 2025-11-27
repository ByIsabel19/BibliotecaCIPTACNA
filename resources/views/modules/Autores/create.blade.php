@extends('layouts.main')

@section('titulo', $titulo)
@section('contenido')
<main id="main" class="main">

<div class="pagetitle">
  <h1>Agregar autor</h1>
</div>

<section class="section">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">

          <h5 class="card-title">Ingresa los datos del nuevo autor</h5>

          <form action="{{route('autores.store')}}" method="POST">
            @csrf

            <label for="">Nombre del autor</label>
            <input type="text" class="form-control" required name="nombre_autor" id="nombre_autor">

            <button class="btn btn-primary mt-3">Guardar</button>
            <a href="{{route('autores')}}" class="btn btn-info mt-3">Cancelar</a>
          </form>

        </div>
      </div>
    </div>
  </div>
</section>

</main>
@endsection
