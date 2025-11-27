@extends('layouts.main')

@section('titulo', $titulo)
@section('contenido')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Crear capítulo</h1>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">

              <h5 class="card-title">Registrar nuevo capítulo</h5>

              <form action="{{ route('capitulos.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                  <label class="form-label">Nombre del capítulo</label>
                  <input type="text" name="nombre_capitulo" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="{{ route('capitulos') }}" class="btn btn-secondary">Cancelar</a>

              </form>

            </div>
          </div>

        </div>
      </div>
    </section>

  </main>
@endsection
