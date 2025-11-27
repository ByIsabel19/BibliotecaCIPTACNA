@extends('layouts.main')

@section('titulo', $titulo)
@section('contenido')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Capítulos</h1>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Administrar capítulos</h5>
              <p>Administrar los capítulos registrados</p>

              <a href="{{route("capitulos.create")}}" class="btn btn-primary">
                <i class="fa-solid fa-circle-plus"></i> Agregar nuevo
              </a>

              <hr>

              <table class="table datatable">
                <thead>
                  <tr>
                    <th>Nombre del capítulo</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($item as $item)
                  <tr>
                    <td>{{$item->nombre_capitulo}}</td>
                    <td>
                      <a href="{{route("capitulos.edit",$item->id)}}" class="btn btn-warning">
                        <i class="fa-solid fa-pen-to-square"></i>
                      </a>

                      <a href="{{route("capitulos.show",$item->id)}}" class="btn btn-danger">
                        <i class="fa-solid fa-trash-can"></i>
                      </a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>

            </div>
          </div>

        </div>
      </div>
    </section>

  </main>
@endsection
