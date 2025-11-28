@extends('layouts.main')

@section('titulo', $titulo)
@section('contenido')
<main id="main" class="main">

<div class="pagetitle">
  <h1>Eliminar carrera</h1>
</div>

<section class="section">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">

          <h5 class="card-title">¿Deseas eliminar esta carrera?</h5>

          <form action="{{ route('carreras.destroy', $carrera->id) }}" method="POST">
            @csrf
            @method('DELETE')

            <label>Nombre de carrera</label>
            <input type="text" class="form-control" readonly
              value="{{ $carrera->nombre_carrera }}">

            <label class="mt-3">Capítulo</label>
            <input type="text" class="form-control" readonly
              value="{{ $carrera->capitulo->nombre_capitulo }}">

            <button class="btn btn-danger mt-3">Eliminar</button>
            <a href="{{ route('carreras.index') }}" class="btn btn-info mt-3">Cancelar</a>
          </form>

        </div>
      </div>
    </div>
  </div>
</section>

</main>
@endsection
