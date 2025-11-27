{{-- =========================
     SECCIÓN ADMINISTRADORES
========================= --}}
@if($item->where('rol_usuario','administrador')->count() > 0)
<tr>
    <td colspan="6"
        class="fw-bold text-start bg-light py-2"
        style="font-size: 18px;">
        Administradores
    </td>
</tr>

@foreach ($item->where('rol_usuario','administrador') as $usuario)
<tr class="text-center">
    <td>{{ $usuario->email }}</td>
    <td>{{ $usuario->name }}</td>
    <td>{{ $usuario->rol_usuario }}</td>
    <td>
        <a href="" class="btn btn-secondary">
            <i class="fa-solid fa-user-lock"></i>
        </a>
    </td>
    <td>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="{{ $usuario->id }}"
                {{ $usuario->activo ? 'checked' : '' }}>
        </div>
    </td>
    <td>
        <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-warning">
            <i class="fa-solid fa-user-pen"></i>
        </a>
    </td>
</tr>
@endforeach
@endif

{{-- =========================
        SECCIÓN LECTORES
========================= --}}
@if($item->where('rol_usuario','lector')->count() > 0)
<tr>
    <td colspan="6"
        class="fw-bold text-start bg-light py-2"
        style="font-size: 18px;">
        Lectores
    </td>
</tr>

@foreach ($item->where('rol_usuario','lector') as $usuario)
<tr class="text-center">
    <td>{{ $usuario->email }}</td>
    <td>{{ $usuario->name }}</td>
    <td>{{ $usuario->rol_usuario }}</td>
    <td>
        <a href="" class="btn btn-secondary">
            <i class="fa-solid fa-user-lock"></i>
        </a>
    </td>
    <td>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="{{ $usuario->id }}"
                {{ $usuario->activo ? 'checked' : '' }}>
        </div>
    </td>
    <td>
        <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-warning">
            <i class="fa-solid fa-user-pen"></i>
        </a>
    </td>
</tr>
@endforeach
@endif
