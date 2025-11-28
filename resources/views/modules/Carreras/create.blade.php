@extends('layouts.main')

@section('titulo', $titulo)

@section('contenido')
<main id="main" class="main">

<div class="pagetitle">
  <h1>Registrar Nueva Carrera</h1>
</div>

<section class="section">
  <div class="row">
    <div class="col-lg-8">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Nueva Carrera</h5>

          {{-- MENSAJES DE ERROR --}}
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif

          {{-- FORMULARIO --}}
          <form action="{{ route('carreras.store') }}" method="POST">
            @csrf

            <div class="mb-3">
              <label class="form-label">Nombre de la Carrera</label>
              <input 
                type="text" 
                name="nombre_carrera" 
                class="form-control" 
                value="{{ old('nombre_carrera') }}"
                required>
            </div>

            <div class="mb-3">
              <label class="form-label">Capítulo</label>
              <select name="id_capitulo" class="form-control" required>
                <option value="">Seleccione un capítulo</option>
                @foreach ($capitulos as $cap)
                  <option value="{{ $cap->id }}"
                    {{ old('id_capitulo') == $cap->id ? 'selected' : '' }}>
                    {{ $cap->nombre_capitulo }}
                  </option>
                @endforeach
              </select>
            </div>

            <button type="submit" class="btn btn-primary">
              <i class="fa-solid fa-floppy-disk"></i> Guardar
            </button>

            <a href="{{ route('carreras.index') }}" class="btn btn-secondary">
              Cancelar
            </a>

          </form>

        </div>
      </div>

    </div>
  <
