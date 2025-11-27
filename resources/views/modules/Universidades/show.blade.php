@extends('layouts.main')

@section('titulo', $titulo)
@section('contenido')
<main id="main" class="main">

<div class="pagetitle">
  <h1>Eliminar universidad</h1>
</div>

<section class="section">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">¿Deseas eliminar esta universidad?</h5>
          <form action="{{route("universidades.destroy", $item->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <label for="">Nombre de la universidad</label>
                <input type="text" class="form-control" readonly
                name="nombre_universidad" id="nombre_universidad" value="{{$item->nombre_universidad}}">
                <button class="btn btn-danger mt-3">Eliminar</button>
                <a href="{{route("universidades")}}" class="btn btn-info mt-3">Cancelar</a>
              </form>
        </div>
      </div>
    </div>
  </div>
</section>

</main>
@endsection
