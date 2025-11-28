<!-- MODAL AUTOR -->
<div class="modal fade" id="modalAutor">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header"><h5>Agregar Autor</h5></div>
      <div class="modal-body">
        <input type="text" id="nuevo_autor" class="form-control" placeholder="Nombre del autor">
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" onclick="guardarAutor()">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL UNIVERSIDAD -->
<div class="modal fade" id="modalUniversidad">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header"><h5>Agregar Universidad</h5></div>
      <div class="modal-body">
        <input type="text" id="nueva_uni" class="form-control" placeholder="Nombre universidad">
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" onclick="guardarUni()">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL CARRERA -->
<div class="modal fade" id="modalCarrera">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header"><h5>Agregar Carrera</h5></div>
      <div class="modal-body">
        <input type="text" id="nueva_carrera" class="form-control" placeholder="Nombre carrera">

        <label class="mt-2">Capítulo</label>
        <select id="cap_carrera" class="form-control">
            @foreach($capitulos as $cp)
            <option value="{{ $cp->id }}">{{ $cp->nombre_capitulo }}</option>
            @endforeach
        </select>

      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" onclick="guardarCarrera()">Guardar</button>
      </div>
    </div>
  </div>
</div>
