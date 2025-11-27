@extends('layouts.main')

@section('titulo', $titulo)
@section('contenido')
<main id="main" class="main">

<div class="pagetitle">
  <h1>Agregar carrera</h1>
</div>

<section class="section">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Ingresa los datos de la carrera</h5>

          <form action="{{route('carreras.store')}}" method="POST">
            @csrf

            <label>Nombre de carrera</label>
            <input type="text" class="form-control" required name="nombre_carrera">

            <label class="mt-3">Capítulo</label>
            <select class="form-control" required name="id_capitulo">
              <option value="">Seleccione...</option>
              @foreach ($capitulos as $c)
                <option value="{{$c->id}}">{{$c->nombre_capitulo}}</option>
              @endforeach
            </select>

            <button class="btn btn-primary mt-3">Guardar</button>
            <a href="{{route('carreras')}}" class="btn btn-info mt-3">Cancelar</a>
          </form>

        </div>
      </div>
    </div>
  </div>
</section>

</main>
@endsection
