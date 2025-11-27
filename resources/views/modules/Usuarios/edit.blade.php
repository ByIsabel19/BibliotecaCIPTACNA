  @extends('layouts.main')

  @section('titulo', $titulo)
  @section('contenido')
    <main id="main" class="main">

    <div class="pagetitle">
      <h1>Editar usuario</h1>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Ingresa los nuevos datos del usuario</h5>
              <form action="{{route("usuarios.update",$item->id)}}" method="POST">
                @csrf
                @method("PUT")
                <label for="name">Nombre del usuario</label>
                <input type="text" class="form-control" required name="name" id="name" value="{{$item->name}}">
                <label for="email">Correo electronico</label>
                <input type="text" class="form-control" name="email" id="email" required value="{{$item->email}}">
                <label for="rol_usuario">Rol de usuario</label>
                <select name="rol_usuario" id="rol_usuario" class="form-select" >
                    <option value="">Selecciona el rol</option>
                    @if ($item->rol_usuario=='administrador')
                        <option value="administrador" selected>Administrador</option>
                        <option value="lector">Lector</option> 
                    @else
                        <option value="administrador">Administrador</option>
                        <option value="lector" selected>Lector</option>
                    @endif
                </select>

                <button class="btn btn-warning mt-3">Actualizar</button>
                <a href="{{route("usuarios")}}" class="btn btn-info mt-3">Cancelar</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main> 
  @endsection