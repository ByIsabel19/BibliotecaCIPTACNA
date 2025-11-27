  @extends('layouts.main')

  @section('titulo', $titulo)
  @section('contenido')
    <main id="main" class="main">

    <div class="pagetitle">
      <h1>Agregar categorías</h1>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Ingresa los datos de la nueva categoría</h5>
              <form action="{{route("categorias.store")}}" method="POST">
                @csrf
                <label for="">Nombre de categoría</label>
                <input type="text" class="form-control" required name="nombre_categoria" id="nombre_categoria">
                <button class="btn btn-primary mt-3">Guardar</button>
                <a href="{{route("categorias")}}" class="btn btn-info mt-3">Cancelar</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main> 
  @endsection