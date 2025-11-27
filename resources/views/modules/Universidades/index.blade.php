@extends('layouts.main')

@section('titulo', $titulo)
@section('contenido')
<main id="main" class="main">

<div class="pagetitle">
  <h1>Universidades</h1>
</div>

<section class="section">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Administrar universidades</h5>
          <p>Administrar las universidades registradas</p>

          <a href="{{route('universidades.create')}}" class="btn btn-primary">
            <i class="fa-solid fa-circle-plus"></i> Agregar nueva
          </a>

          <hr>

          <table class="table datatable">
            <thead>
              <tr>
                <th class="text-center">Nombre universidad</th>
                <th class="text-center">Acciones</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($item as $item)
              <tr class="text-center">
                <td>{{$item->nombre_universidad}}</td>
                <td>
                  <a href="{{route('universidades.edit',$item->id)}}" class="btn btn-warning">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </a>

                  <a href="{{route('universidades.show',$item->id)}}" class="btn btn-danger">
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
