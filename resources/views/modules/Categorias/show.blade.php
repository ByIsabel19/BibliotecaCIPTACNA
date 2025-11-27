  @extends('layouts.main')

  @section('titulo', $titulo)
  @section('contenido')
    <main id="main" class="main">

    <div class="pagetitle">
      <h1>Eliminar categorías</h1>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">¿Está seguro de eliminar esta categoría?</h5>
              <form action="{{route("categorias.destroy", $item->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <label for="">Nombre de categoría</label>
                <input type="text" class="form-control" readonly
                name="nombre_categoria" id="nombre_categoria" value="{{$item->nombre_categoria}}">
                <button class="btn btn-danger mt-3">Eliminar</button>
                <a href="{{route("categorias")}}" class="btn btn-info mt-3">Cancelar</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main> 
  @endsection