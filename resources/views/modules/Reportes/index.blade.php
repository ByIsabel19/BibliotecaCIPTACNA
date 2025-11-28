@extends('layouts.main')

@section('titulo', $titulo ?? 'Reportes')
@section('contenido')

<main id="main" class="main">

<div class="pagetitle">
  <h1>Generar Reportes</h1>
</div>

<section class="section">

  <div class="card">
    <div class="card-body">

      <h5 class="card-title">Seleccione el reporte a generar</h5>

      {{-- formulario POST que envía "tipo" --}}
      <form action="{{ route('reportes.generar') }}" method="POST" target="visorPDF">
        @csrf

        <label class="form-label">Tipo de reporte</label>
        <select name="tipo" class="form-control" required>
          <option value="">Seleccione…</option>
          <option value="usuarios">Usuarios</option>
          <option value="autores">Autores</option>
          <option value="items">Items</option>
          <option value="carreras">Carreras</option>
          <option value="universidades">Universidades</option>
        </select>

        <button type="submit" class="btn btn-primary mt-3">
          Generar PDF
        </button>

      </form>

      <h5 class="card-title mt-4">Vista previa del PDF</h5>

      <iframe name="visorPDF" style="width:100%; height:600px; border:1px solid #ccc;"></iframe>

    </div>
  </div>

</section>

</main>

@endsection
