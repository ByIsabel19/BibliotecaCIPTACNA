@extends('layouts.main')

@section('titulo',$titulo)
@section('contenido')

<main id="main" class="main">

<div class="pagetitle">
  <h1>Agregar Ítem</h1>
</div>

<section class="section">
<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-body">

<h5 class="card-title">Completa los datos del ítem</h5>

<form action="{{ route('items.store') }}" method="POST">
@csrf

<label>Categoría</label>
<select name="id_categoria" class="form-control" required>
    <option value="">Seleccione</option>
    @foreach($categorias as $cate)
        <option value="{{ $cate->id }}">{{ $cate->nombre_categoria }}</option>
    @endforeach
</select>

<label class="mt-3">Título del Ítem</label>
<input type="text" name="nombre_item" class="form-control" required>

<label class="mt-3">Año</label>
<input type="number" name="anio_item" class="form-control" required>

<label class="mt-3">Autores</label>
<div class="d-flex">
    <select name="autores[]" class="form-control" multiple required id="select-autores">
        @foreach($autores as $a)
        <option value="{{ $a->id }}">{{ $a->nombre_autor }}</option>
        @endforeach
    </select>
    <button type="button" class="btn btn-success ms-2" data-bs-toggle="modal" data-bs-target="#modalAutor">+</button>
</div>

<label class="mt-3">Universidad</label>
<div class="d-flex">
    <select name="id_universidad" class="form-control" id="select-universidad">
        <option value="">Seleccione</option>
        @foreach($universidades as $u)
        <option value="{{ $u->id }}">{{ $u->nombre_universidad }}</option>
        @endforeach
    </select>
    <button type="button" class="btn btn-success ms-2" data-bs-toggle="modal" data-bs-target="#modalUniversidad">+</button>
</div>

<label class="mt-3">Carrera</label>
<div class="d-flex">
    <select name="id_carrera" class="form-control" id="select-carrera">
        <option value="">Seleccione</option>
        @foreach($carreras as $c)
        <option value="{{ $c->id }}">{{ $c->nombre_carrera }}</option>
        @endforeach
    </select>
    <button type="button" class="btn btn-success ms-2" data-bs-toggle="modal" data-bs-target="#modalCarrera">+</button>
</div>

<label class="mt-3">¿Tiene disco?</label>
<select name="disco_item" class="form-control">
    <option value="0">No</option>
    <option value="1">Sí</option>
</select>

<button class="btn btn-primary mt-4">Guardar</button>
</form>

</div>
</div>
</div>
</div>
</section>

</main>

@include('modules.Items.modals')

@endsection

@push('scripts')
<script>
function guardarAutor(){
    $.post("{{ route('autores.ajax') }}",{
        _token: "{{ csrf_token() }}",
        nombre_autor: $("#nuevo_autor").val()
    },function(res){
        $("#select-autores").append(
            `<option value="${res.id}" selected>${res.nombre_autor}</option>`
        );
        $("#modalAutor").modal('hide');
    });
}

function guardarUni(){
    $.post("{{ route('universidades.ajax') }}",{
        _token: "{{ csrf_token() }}",
        nombre_universidad: $("#nueva_uni").val()
    },function(res){
        $("#select-universidad").append(
            `<option value="${res.id}" selected>${res.nombre_universidad}</option>`
        );
        $("#modalUniversidad").modal('hide');
    });
}

function guardarCarrera(){
    $.post("{{ route('carreras.ajax') }}",{
        _token: "{{ csrf_token() }}",
        nombre_carrera: $("#nueva_carrera").val(),
        id_capitulo: $("#cap_carrera").val()
    },function(res){
        $("#select-carrera").append(
            `<option value="${res.id}" selected>${res.nombre_carrera}</option>`
        );
        $("#modalCarrera").modal('hide');
    });
}
</script>
@endpush
