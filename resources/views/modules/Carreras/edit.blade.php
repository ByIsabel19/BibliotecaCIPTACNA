@extends('layouts.main')

@section('titulo', $titulo)
@section('contenido')
<main id="main" class="main">

<div class="pagetitle">
  <h1>Editar carrera</h1>
</div>

<section class="section">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">

          <h5 class="card-title">Actualiza los datos de la carrera</h5>

          <form action="{{route('carreras.update', $item->id)}}" method="POST">
            @csrf
            @method("PUT")

            <label>Nombre de carrera</label>
            <input type="text" class="form-control" required
              name="nombre_carrera" value="{{$item->nombre_carrera}}">

            <label class="mt-3">Capítulo</label>
            <select class="form-control" required name="id_capitulo">
              @foreach ($capitulos as $c)
                <option value="{{$c->id}}" @if($c->id == $item->id_capitulo) selected @endif>
                  {{$c->nombre_capitulo}}
                </option>
              @endforeach
            </select>

            <button class="btn btn-warning mt-3">Actualizar</button>
            <a href="{{route('carreras')}}" class="btn btn-info mt-3">Cancelar</a>

          </form>

        </div>
      </div>
    </div>
  </div>
</section>

</main>
@endsection
