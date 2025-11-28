@extends('layouts.main')

@section('titulo', $titulo)

@section('contenido')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Agregar Ítem</h1>
    </div>

    <section class="section">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Registrar nuevo Ítem</h5>

                        <form action="{{ route('items.store') }}" method="POST">
                            @csrf

                            <!-- CATEGORÍA -->
                            <div class="mb-3">
                                <label class="form-label">Categoría</label>
                                <select name="id_categoria" class="form-control" required>
                                    <option value="">Seleccione</option>
                                    @foreach ($categorias as $c)
                                        <option value="{{ $c->id }}">{{ $c->nombre_categoria }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- NOMBRE ÍTEM -->
                            <div class="mb-3">
                                <label class="form-label">Título / Nombre del ítem</label>
                                <input type="text" name="nombre_item" class="form-control" required>
                            </div>

                            <!-- AÑO / DISCO -->
                            <div class="mb-3">
                                <label class="form-label">Año</label>
                                <input type="number" name="anio_item" class="form-control" min="1900" max="2099" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">¿Tiene disco?</label>
                                <select name="disco_item" class="form-control">
                                    <option value="0">No</option>
                                    <option value="1">Sí</option>
                                </select>
                            </div>

                            <hr>

                            <!-- AUTORES -->
                            <h5>Autores</h5>

                            <div id="contenedor-autores">

                                <div class="autor-item mb-2 d-flex gap-2">
                                    <select name="autores[]" class="form-control" required>
                                        <option value="">Seleccione</option>
                                        @foreach ($autores as $a)
                                            <option value="{{ $a->id }}">{{ $a->nombre_autor }}</option>
                                        @endforeach
                                    </select>

                                    <button type="button" class="btn btn-danger btn-eliminar-autor" style="display:none;">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>

                            </div>

                            <button type="button" id="btnAgregarAutor" class="btn btn-secondary mt-2">
                                <i class="fa-solid fa-plus"></i> Añadir autor
                            </button>

                            <hr>

                            <!-- UNIVERSIDAD -->
                            <div class="mb-3">
                                <label class="form-label">Universidad</label>
                                <select name="id_universidad" class="form-control">
                                    <option value="">Seleccione</option>
                                    @foreach ($universidades as $u)
                                        <option value="{{ $u->id }}">{{ $u->nombre_universidad }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- CARRERA -->
                            <div class="mb-3">
                                <label class="form-label">Carrera</label>
                                <select name="id_carrera" id="id_carrera" class="form-control">
                                    <option value="">Seleccione</option>
                                    @foreach ($carreras as $car)
                                        <option value="{{ $car->id }}" data-capitulo="{{ $car->capitulo->nombre_capitulo ?? '' }}">
                                            {{ $car->nombre_carrera }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- CAPÍTULO (solo visual) -->
                            <div class="mb-3">
                                <label class="form-label">Capítulo asociado</label>
                                <input type="text" id="capitulo_view" class="form-control" readonly placeholder="Seleccione una carrera">
                            </div>

                            <button type="submit" class="btn btn-primary w-100 mt-3">Guardar ítem</button>

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

// =============================
//   AUTORES DINÁMICOS
// =============================
document.getElementById('btnAgregarAutor').addEventListener('click', function() {

    let contenedor = document.getElementById('contenedor-autores');

    let nuevo = document.createElement('div');
    nuevo.classList.add('autor-item','mb-2','d-flex','gap-2');

    nuevo.innerHTML = `
        <select name="autores[]" class="form-control" required>
            <option value="">Seleccione</option>
            @foreach ($autores as $a)
                <option value="{{ $a->id }}">{{ $a->nombre_autor }}</option>
            @endforeach
        </select>

        <button type="button" class="btn btn-danger btn-eliminar-autor">
            <i class="fa-solid fa-trash"></i>
        </button>
    `;

    contenedor.appendChild(nuevo);
});

// eliminar autores
document.addEventListener('click', function(e){
    if(e.target.closest('.btn-eliminar-autor')){
        e.target.closest('.autor-item').remove();
    }
});

// =============================
//   MOSTRAR CAPÍTULO AUTOMÁTICO
// =============================

document.getElementById("id_carrera").addEventListener("change", function() {

    let option = this.selectedOptions[0];
    let capitulo = option.getAttribute("data-capitulo");

    document.getElementById("capitulo_view").value = capitulo ? capitulo : "";
});

</script>
@endpush
