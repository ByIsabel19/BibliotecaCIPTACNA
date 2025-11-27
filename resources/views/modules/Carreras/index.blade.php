@extends('layouts.main')

@section('titulo', $titulo)
@section('contenido')
<main id="main" class="main">

<div class="pagetitle">
  <h1>Carreras</h1>
</div>

<section class="section">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Administrar carreras</h5>
          <p>Administra las carreras registradas</p>

          <a href="{{route('carreras.create')}}" class="btn btn-primary">
            <i class="fa-solid fa-circle-plus"></i> Agregar nueva
          </a>
          <hr>

          <table class="table datatable">
            <thead>
              <tr>
                <th>Nombre de Carrera</th>
                <th>Capítulo</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($item as $item)
                <tr>
                  <td>{{$item->nombre_carrera}}</td>
                  <td>{{$item->capitulo->nombre_capitulo}}</td>
                  <td>
                    <a href="{{route('carreras.edit', $item->id)}}" class="btn btn-warning">
                      <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    <a href="{{route('carreras.show', $item->id)}}" class="btn btn-danger">
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
