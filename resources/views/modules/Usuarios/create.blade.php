  @extends('layouts.main')

  @section('titulo', $titulo)
  @section('contenido')
    <main id="main" class="main">

    <div class="pagetitle">
      <h1>Agregar usuario</h1>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Ingresa los datos del nuevo usuario</h5>
              <form action="{{route("usuarios.store")}}" method="POST">
                @csrf
                <label for="name">Nombre del usuario</label>
                <input type="text" class="form-control" required name="name" id="name">
                <label for="email">Correo electronico</label>
                <input type="text" class="form-control" name="email" id="email" required>
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" name="password" id="password" required>
                <label for="rol_usuario">Rol de usuario</label>
                <select name="rol_usuario" id="rol_usuario" class="form-select">
                    <option value="">Selecciona el rol</option>
                    <option value="administrador">Administrador</option>
                    <option value="lector">Lector</option>
                </select>

                <button class="btn btn-primary mt-3">Guardar</button>
                <a href="{{route("usuarios")}}" class="btn btn-info mt-3">Cancelar</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main> 
  @endsection