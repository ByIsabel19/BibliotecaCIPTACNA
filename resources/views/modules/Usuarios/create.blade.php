@extends('layouts.main')

@section('titulo', $titulo)

@section('contenido')
<main id="main" class="main">

<div class="pagetitle">
  <h1>Agregar usuario</h1>
</div>

<section class="section">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">

          <h5 class="card-title">Registrar nuevo usuario</h5>

          <form action="{{ route('usuarios.store') }}" method="POST">
            @csrf

            <label>Nombre completo</label>
            <input type="text" class="form-control" name="name" required>

            <label class="mt-2">Correo electrónico</label>
            <input type="email" class="form-control" name="email" required>

            <label class="mt-2">Contraseña</label>
            <input type="password" class="form-control" name="password" required>

            <label class="mt-2">Rol de usuario</label>
            <select class="form-control" name="rol_usuario" id="rol_usuario" required>
              <option value="">Seleccione</option>
              <option value="administrador">Administrador</option>
              <option value="lector">Lector</option>
            </select>

            {{-- Campos visibles solo si es lector --}}
            <div id="campos_lector" style="display:none;">

              <label class="mt-3">Teléfono</label>
              <input type="text" class="form-control" name="telefono_lector">

              <label class="mt-2">CIP</label>
              <input type="text" class="form-control" name="cip_lector">

            </div>

            <button class="btn btn-primary mt-3">Guardar</button>
            <a href="{{ route('usuarios') }}" class="btn btn-secondary mt-3">Cancelar</a>

          </form>

        </div>
      </div>
    </div>
  </div>
</section>

</main>
@endsection

@push('scripts')
<script>
  document.getElementById('rol_usuario').addEventListener('change', function(){
      if(this.value === 'lector'){
          document.getElementById('campos_lector').style.display = 'block';
      } else {
          document.getElementById('campos_lector').style.display = 'none';
      }
  });
</script>
@endpush
