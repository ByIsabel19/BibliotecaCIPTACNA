@extends('layouts.main')

@section('titulo', $titulo)
@section('contenido')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Eliminar capítulo</h1>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">

              <h5 class="card-title">¿Eliminar este capítulo?</h5>
              <form action="{{ route('capitulos.destroy', $item->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <label for="">Nombre de capitulo</label>
                <input type="text" class="form-control" readonly
                name="nombre_capitulo" id="nombre_capitulo" value="{{$item->nombre_capitulo}}">
                <button class="btn btn-danger mt-3">Eliminar</button>
                <a href="{{route("capitulos")}}" class="btn btn-info mt-3">Cancelar</a>
              </form>

            </div>
          </div>

        </div>
      </div>
    </section>

  </main>
@endsection
